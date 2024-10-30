<div style="border:3px solid #929292;" id="calculatorContainer" class="calculator">
	<div class="text">
		<h2>Concrete Calculator</h2>
		<p style="border-bottom:2px solid #929292;">Please use this calculator to estimate the quantity of concrete required for your project.</p>
	</div>
	<div style="font-size:18px!important;" class="calculator">
		<form id="calc">
			<div class="left">
				<fieldset>
					<input class="calcPaddingTop" type="number" name="length" value="" id="length" size="10" placeholder="Length:">
					<select name="lengthunits" id="lengthunits" size="1">
						<option value="1">metres</option>
					</select>
				</fieldset>
				<fieldset>
					<input class="calcPaddingTop" type="number" name="width" value="" id="width" size="10" placeholder="Width:" >
					<select name="widthunits" id="widthunits" size="1">
						<option value="1">metres</option>
					</select>
				</fieldset>
			</div>
			<div class="right">
				<fieldset>
					<input class="calcPaddingTop" type="number" name="depth" value="" id="depth" size="10" placeholder="Depth:">
					<select name="depthunits" id="depthunits" size="1">
						<option value="1">metres</option>
					</select>
				</fieldset>
				<input type="hidden" id="unit_type" name="unit_type" value="metric"/>
				<input class="calc-button" type="button" id="calculate" value="Calculate">
				<input class="reset" type="reset" id="reset" value="Reset">
			</div>
			<div class="calculator-results">
				<p id="ans_holder" style="display:none;padding: 10px 0px;text-align: center;border-top:1px solid #f36c21;border-bottom:1px solid #f36c21;"><span  id="answer">You need: 84m³ </span> 