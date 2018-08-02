USE [Tech_Matrix]
GO
/****** Object:  UserDefinedFunction [dbo].[Project_Costs]    Script Date: 7/25/2018 9:09:19 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO


CREATE function [dbo].[Technology_Calculations]()
RETURNS	@Results TABLE (
	id int not null,
	technology_id int null,

	p_percent_reduction_low float null,
	p_percent_reduction_high float null,
	baseline_concentration_p float null,
	flow_gpd float null,
	p_removed_low float null,
	p_removed_high float null,
	p_removed_avg float null,
	p_removed_planning_period float null,

	n_percent_reduction_low float null,
	n_percent_reduction_high float null,
	baseline_concentration_n float null,
	n_removed_low float null,
	n_removed_high float null,
	n_removed_avg float null,
	n_removed_planning_period float null,

	current_project_cost_low float null,
	current_project_cost_high float null,
	adjustment_factor_project_cost float null,
	replacement_cost_factor float null,
	useful_life_years int null,
	n_per_years int null,

	discount_rate float null,
	adj_project_cost_low float null,
	adj_project_cost_high float null,
	adj_project_cost_avg float null,
	replacement_cost float DEFAULT 0,
	total_replacement_cost float DEFAULT 0,
	project_cost_pv float default 0,

	current_annual_o_m_cost_low float null,
	current_annual_o_m_cost_high float null,
	adjustment_factor_o_m_cost float null,

	adj_o_m_cost_low float null,
	adj_o_m_cost_high float null,
	adj_o_m_cost_avg float null,

	cost_per_kg_avg_project_cost_n float default 0,
	cost_per_kg_avg_project_cost_p float default 0,
	cost_per_kg_avg_om_cost_n float default 0,
	cost_per_kg_avg_om_cost_p float default 0,
	cost_per_kg_avg_lifecycle_cost_n float default 0,
	cost_per_kg_avg_lifecycle_cost_p float default 0
)
AS
BEGIN
	Insert into @Results
		(id, technology_id, p_percent_reduction_low, p_percent_reduction_high, baseline_concentration_p, flow_gpd,
		n_percent_reduction_low, n_percent_reduction_high, baseline_concentration_n,
		current_project_cost_low, current_project_cost_high, adjustment_factor_project_cost, replacement_cost_factor, useful_life_years, n_per_years, current_annual_o_m_cost_low, current_annual_o_m_cost_high, adjustment_factor_o_m_cost)
	select
		t.id,
		t.technology_id,
		t.p_percent_reduction_low,
		t.p_percent_reduction_high,
		t.baseline_concentration_p,
		t.flow_gpd,
		t.n_percent_reduction_low,
		t.n_percent_reduction_high,
		t.baseline_concentration_n,
		t.current_project_cost_low,
		t.current_project_cost_high,
		t.adjustment_factor_project_cost,
		t.replacement_cost_factor,
		t.useful_life_years,
		i.input_value as 'n_per_years',
		t.current_annual_o_m_cost_low,
		t.current_annual_o_m_cost_high,
		t.adjustment_factor_o_m_cost
	from technologies t,
		lkp_inputs i
	where i.input_name = 'n_per_years'
	;

	-- Start Phosphorus reduction calculations
	update @Results
	Set 
		p_removed_low = (baseline_concentration_p * (p_percent_reduction_low/100) * (8.34 * (flow_gpd/1000000)) * 365 * 0.4536),
		p_removed_high = (baseline_concentration_p * (p_percent_reduction_high/100) * (8.34 * (flow_gpd/1000000)) * 365 * 0.4536)
	;

	update @Results
	Set 
		p_removed_avg = (p_removed_low + p_removed_high)/2
	;

	update @Results
	Set 
		p_removed_planning_period = (p_removed_avg * n_per_years)
	;
	-- / End Posphorus reduction calculations

	-- Start Nitrogen reduction
	update @Results
	Set 
		n_removed_low = (baseline_concentration_n * (n_percent_reduction_low/100) * (8.34 * (flow_gpd/1000000)) * 365 * 0.4536),
		n_removed_high = (baseline_concentration_n * (n_percent_reduction_high/100) * (8.34 * (flow_gpd/1000000)) * 365 * 0.4536)
		--n_removed_avg = (n_removed_low + n_removed_high)/2
	where technology_id in (101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 204, 205, 206, 207, 208, 209, 210, 300, 301, 302, 303, 304, 400, 401, 402, 403, 404, 500, 502, 504, 506, 600, 601, 602, 603, 604, 605, 606, 607, 608, 701, 702, 703, 704, 705, 706, 800, 801, 802, 803, 804, 805, 806, 807, 808, 809, 810)
	;

	update @Results
		set
			n_removed_low = (select input_value
	from lkp_inputs
	where input_name = 'aquaculture_n_removed_low'),
			n_removed_high = (select input_value
	from lkp_inputs
	where input_name = 'aquaculture_n_removed_high')
		where technology_id in (201, 202, 203, 501)
	;

	update @Results
		Set 
			n_removed_avg = (n_removed_low + n_removed_high)/2
	;

	update @Results
		Set 
			n_removed_planning_period = (n_removed_avg * n_per_years)
	;
	-- / End Nitrogen reduction

	-- Start Project Costs Calculations
	update @Results
	Set 
		adj_project_cost_low = (current_project_cost_low * (1 + adjustment_factor_project_cost)),
		adj_project_cost_high = (current_project_cost_high * (1 + adjustment_factor_project_cost)),
		adj_project_cost_avg = ((current_project_cost_low + current_project_cost_high)/2 ) * (1 + adjustment_factor_project_cost),
		discount_rate = (select input_value
	from lkp_inputs
	where input_name = 'discount_rate')
	;

	update @Results
	Set
		replacement_cost = adj_project_cost_avg * replacement_cost_factor
	;

	update @Results
	set total_replacement_cost = case
        when useful_life_years > 0 
			then (n_per_years/useful_life_years) * replacement_cost
			else 0
        end
	;

	update @Results
	set
		project_cost_pv = round(replacement_cost  / ( Power(1 + (power(1 + discount_rate, useful_life_years)-1), ((n_per_years/useful_life_years)-1 ))), 0)
	;
	-- / END Project Costs calculations

	-- O&M Costs
	update @Results
	Set 
		adj_o_m_cost_low = (current_annual_o_m_cost_low * (1 + adjustment_factor_o_m_cost)),
		adj_o_m_cost_high = (current_annual_o_m_cost_high * (1 + adjustment_factor_o_m_cost)),
		adj_o_m_cost_avg = ((current_annual_o_m_cost_low + current_annual_o_m_cost_high)/2 ) * (1 + adjustment_factor_o_m_cost)
	;

	-- Start Cost Per Kg Reduction

	update @Results
	SET
		cost_per_kg_avg_project_cost_n = 
			case
        		when n_removed_planning_period > 0 
			then
				adj_project_cost_avg + project_cost_pv / n_removed_planning_period
			else 0
			end
			,
		cost_per_kg_avg_om_cost_n = 
			CASE	
				when n_removed_planning_period > 0
				then 
				( adj_o_m_cost_avg / (power(1 + discount_rate, n_per_years )))/n_removed_planning_period
				ELSE 0
			end,

		cost_per_kg_avg_project_cost_p = 
			case 
				when p_removed_planning_period > 0
				then adj_project_cost_avg + project_cost_pv / p_removed_planning_period
				else 0
			end,

		cost_per_kg_avg_om_cost_p = 
			case when p_removed_planning_period > 0
				then (( adj_o_m_cost_avg / (power(1 + discount_rate, n_per_years)) )/ p_removed_planning_period )
				else 0 
				end
	;

	update @Results
	SET
		cost_per_kg_avg_lifecycle_cost_n = cost_per_kg_avg_project_cost_n + cost_per_kg_avg_om_cost_n,
		cost_per_kg_avg_lifecycle_cost_p = cost_per_kg_avg_project_cost_p + cost_per_kg_avg_om_cost_p
	;

	return;
end;



