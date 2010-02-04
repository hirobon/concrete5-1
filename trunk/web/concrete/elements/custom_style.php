<?
defined('C5_EXECUTE') or die(_("Access Denied."));
global $c;?>
<?
$txt = Loader::helper('text');
$fh = Loader::helper('form/color'); 

if(!$style) $style = new CustomStyleRule();
$cssData = $style->getCustomStyleRuleCustomStylesArray();
?>

<style type="text/css">
table.ccm-style-property-table td {padding-right: 8px; padding-bottom: 8px}
</style>

<form method="post" id="ccmCustomCssForm" action="<?=$action?>" onsubmit="jQuery.fn.dialog.showLoader();" style="width:96%; margin:auto;">

	<input id="ccm-reset-style" name="reset_css" type="hidden" value="0" />
	
	<ul id="ccm-styleEditPane-tabs" class="ccm-dialog-tabs" style="margin-bottom:16px; margin-top:4px;">
		<li class="ccm-nav-active"><a id="ccm-styleEditPane-tab-fonts" href="#" onclick="return ccmCustomStyle.tabs(this,'fonts');"><?=t('Fonts') ?></a></li>
		<li><a href="javascript:void(0);" onclick="return ccmCustomStyle.tabs(this,'region');"><?=t('Region') ?></a></li>
		<li><a href="javascript:void(0);" onclick="return ccmCustomStyle.tabs(this,'spacing');"><?=t('Spacing') ?></a></li>
		<li><a href="javascript:void(0);" onclick="return ccmCustomStyle.tabs(this,'css');"><?=t('CSS')?></a></li> 
	</ul>		
	
	<div id="ccm-styleEditPane-fonts" class="ccm-styleEditPane">	
		<div class="ccm-block-field-group"> 
			<h2><?php echo t('Fonts')?></h2> 
			<table class="ccm-style-property-table" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
					<?=t('Face')?>
					</td>
					<td>  
					<select name="font_family"> 
						<option <?=($cssData['font_family']=='inherit')?'selected':'' ?> value="inherit"><?=t('Inherit') ?></option>
						<option <?=($cssData['font_family']=='Arial')?'selected':'' ?> value="Arial">Arial</option>
						<option <?=($cssData['font_family']=='Times New Roman')?'selected':'' ?> value="Times New Roman">Times New Roman</option>
						<option <?=($cssData['font_family']=='Courier')?'selected':'' ?> value="Courier">Courier</option>
						<option <?=($cssData['font_family']=='Georgia')?'selected':'' ?> value="Georgia">Georgia</option>
						<option <?=($cssData['font_family']=='Verdana')?'selected':'' ?> value="Verdana">Verdana</option>
					</select>
					</td>
				</tr>				
				<tr>
					<td> 
					<?=t('Size')?> 
					</td>
					<td>
						<input name="font_size" type="text" value="<?=htmlentities( $cssData['font_size'], ENT_COMPAT, APP_CHARSET) ?>" size=2 />	
					</td>
				</tr>
				<tr>
					<td> 
					<?=t('Line Height')?> 
					</td>
					<td>
						<input name="line_height" type="text" value="<?=htmlentities( $cssData['line_height'], ENT_COMPAT, APP_CHARSET) ?>" size=2 />	
					</td>
				</tr>	
				<tr>
					<td> 
					<?=t('Alignment')?> 
					</td>
					<td> 
					<select name="text_align"> 
						<option <?=($cssData['text_align']=='')?'selected':'' ?> value=""><?=t('Default')?></option>
						<option <?=($cssData['text_align']=='left')?'selected':'' ?> value="left"><?=t('Left')?></option>
						<option <?=($cssData['text_align']=='center')?'selected':'' ?> value="center"><?=t('Center')?></option>
						<option <?=($cssData['text_align']=='right')?'selected':'' ?> value="right"><?=t('Right')?></option>
						<option <?=($cssData['text_align']=='justify')?'selected':'' ?> value="justify"><?=t('Justify')?></option>
					</select>
					</td>
				</tr>											
				<tr>
					<td> 
					<?=t('Color')?> 
					</td>
					<td>
					<?=$fh->output( 'color', '', $cssData['color']) ?> 
					</td>
				</tr>
			</table>
		</div> 
	</div>	
	
	<div id="ccm-styleEditPane-region" class="ccm-styleEditPane" style="display:none">
	
		<div class="ccm-block-field-group">
		  <h2><?php echo t('Background')?></h2> 		
		  <?=$fh->output( 'background_color', '', $cssData['background_color']) ?> 
		  <div class="ccm-spacer"></div>
		</div>
		
		<div class="ccm-block-field-group">
		  <h2><?php echo t('Border')?></h2>  
			<table class="ccm-style-property-table" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td> 
					<?=t('Style')?>
					</td>
					<td>
					<select name="border_style" > 
						<option <?=($cssData['border_style']=='none')?'selected':'' ?> value="none"><?=t('none')?></option>
						<option <?=($cssData['border_style']=='solid')?'selected':'' ?> value="solid"><?=t('solid')?></option>
						<option <?=($cssData['border_style']=='dotted')?'selected':'' ?> value="dotted"><?=t('dotted')?></option>
						<option <?=($cssData['border_style']=='dashed')?'selected':'' ?> value="dashed"><?=t('dashed')?></option>
						<option <?=($cssData['border_style']=='double')?'selected':'' ?> value="double"><?=t('double')?></option>
						<option <?=($cssData['border_style']=='groove')?'selected':'' ?> value="groove"><?=t('groove')?></option>
						<option <?=($cssData['border_style']=='inset')?'selected':'' ?> value="inset"><?=t('inset')?></option>
						<option <?=($cssData['border_style']=='outset')?'selected':'' ?> value="outset"><?=t('outset')?></option>
						<option <?=($cssData['border_style']=='ridge')?'selected':'' ?> value="ridge"><?=t('ridge')?></option>
					</select>
					</td>
				</tr>
				<tr>
					<td>
						<?=t('Width')?>
					</td> 				
					<td>
						<input name="border_width" type="text" value="<?=intval($cssData['border_width'])?>" size="2" style="width:20px" /> <span class="ccm-note"><?=t('px')?></span>
					</td>
				</tr>
				<tr>
					<td>
						<?=t('Direction')?>
					</td>
					<td>
					<select name="border_position" > 
						<option <?=($cssData['border_position']=='full')?'selected':'' ?> value="full"><?=t('Full')?></option> 
						<option <?=($cssData['border_position']=='top')?'selected':'' ?> value="top"><?=t('Top')?></option> 
						<option <?=($cssData['border_position']=='right')?'selected':'' ?> value="right"><?=t('Right')?></option>
						<option <?=($cssData['border_position']=='bottom')?'selected':'' ?> value="bottom"><?=t('Bottom')?></option>
						<option <?=($cssData['border_position']=='left')?'selected':'' ?> value="left"><?=t('Left')?></option> 
					</select>
					</td>
				</tr>	
				<tr>
					<td>
						<?=t('Color')?>
					</td>
					<td>
					<?=$fh->output( 'border_color', '', $cssData['border_color']) ?> 
					</td> 
				</tr>
			</table>	  
		</div>		
	
	</div>
	
	<div id="ccm-styleEditPane-spacing" class="ccm-styleEditPane" style="display:none">		
		<div class="ccm-block-field-group">
		<table style="width:100%" border="0" cellspacing="0" cellpadding="0"><tr><td style="width:50%" valign="top">		
		
		  <h2 style="margin-top: 0px"><?php echo t('Margin ')?></h2>
			<table class="ccm-style-property-table" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td> 
					<?=t('Top')?>
					</td>
					<td>
					<input name="margin_top" type="text" value="<?=htmlentities( $cssData['margin_top'], ENT_COMPAT, APP_CHARSET) ?>" size=2 style="width:40px" />
					</td>
				</tr>
				<tr>
					<td> 
					<?=t('Right')?>
					</td>
					<td>
					<input name="margin_right" type="text" value="<?=htmlentities( $cssData['margin_right'], ENT_COMPAT, APP_CHARSET) ?>" size=2 style="width:40px" />
					</td>
				</tr>
				<tr>
					<td> 
					<?=t('Bottom')?>&nbsp;&nbsp;
					</td>
					<td>
					<input name="margin_bottom" type="text" value="<?=htmlentities( $cssData['margin_bottom'], ENT_COMPAT, APP_CHARSET) ?>" size=2 style="width:40px" />
					</td>
				</tr>
				<tr>
					<td> 
					<?=t('Left')?>
					</td>
					<td>
					<input name="margin_left" type="text" value="<?=htmlentities( $cssData['margin_left'], ENT_COMPAT, APP_CHARSET) ?>" size=2 style="width:40px" />
					</td>
				</tr>												
			</table>	 
		</td><td valign="top">		 
			<h2 style="margin-top: 0px"><?php echo t('Padding ')?></h2>
			<table class="ccm-style-property-table" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td> 
					<?=t('Top')?>
					</td>
					<td>
					<input name="padding_top" type="text" value="<?=htmlentities( $cssData['padding_top'], ENT_COMPAT, APP_CHARSET) ?>" size=2 style="width:40px" />
					</td>
				</tr>
				<tr>
					<td> 
					<?=t('Right')?>
					</td>
					<td>
					<input name="padding_right" type="text" value="<?=htmlentities( $cssData['padding_right'], ENT_COMPAT, APP_CHARSET) ?>" size=2 style="width:40px" />
					</td>
				</tr>
				<tr>
					<td> 
					<?=t('Bottom')?>&nbsp;&nbsp;
					</td>
					<td>
					<input name="padding_bottom" type="text" value="<?=htmlentities( $cssData['padding_bottom'], ENT_COMPAT, APP_CHARSET) ?>" size=2 style="width:40px" />
					</td>
				</tr>
				<tr>
					<td> 
					<?=t('Left')?>
					</td>
					<td>
					<input name="padding_left" type="text" value="<?=htmlentities( $cssData['padding_left'], ENT_COMPAT, APP_CHARSET) ?>" size=2 style="width:40px" />
					</td>
				</tr>												
			</table>
		
		</tr></table>
		</div>
	</div>		
	
	<div id="ccm-styleEditPane-css" class="ccm-styleEditPane" style="display:none">	 
	
		<div class="ccm-block-field-group">
		  <h2><?php echo t('CSS ID')?></h2>  
		  <input name="css_id" type="text" value="<?=htmlentities(trim($style->getCustomStyleRuleCSSID()), ENT_COMPAT, APP_CHARSET) ?>" style="width:99%" 
		   onkeyup="ccmCustomStyle.validIdCheck(this,'<?=str_replace(array("'",'"'),'',$style->getCustomStyleRuleCSSID()) ?>')" /> 
		  <div id="ccm-styles-invalid-id" class="ccm-error" style="display:none; padding-top:4px;">
		  	<?=t('Invalid ID.  This id is currently being used by another element on this page.')?>
		  </div>
		</div>	
	
		<div class="ccm-block-field-group">
		  <h2><?php echo t('CSS Class Name(s)')?></h2>  
		  <input name="css_class_name" type="text" value="<?=htmlentities(trim($style->getCustomStyleRuleClassName()), ENT_COMPAT, APP_CHARSET) ?>" style="width:99%" />		  		
		</div>
		
		<div class="ccm-block-field-group">
		  <h2><?php echo t('Additional CSS')?></h2> 
		  <textarea name="css_custom" cols="50" rows="4" style="width:99%"><?=htmlentities($style->getCustomStyleRuleCSSCustom(), ENT_COMPAT, APP_CHARSET) ?></textarea>		
		</div>	
	</div>
	
	<div class="ccm-buttons">
	<a href="#" class="ccm-dialog-close ccm-button-left cancel"><span><em class="ccm-button-close"><?=t('Cancel')?></em></span></a>
	
	<a href="javascript:void(0)" onclick="jQuery.fn.dialog.showLoader();$('#ccmCustomCssForm').submit()" class="ccm-button-right accept"><span><?=t('Update')?></span></a>
	<a onclick="return ccmCustomStyle.resetAll();" class="ccm-button-right accept" style="margin-right:8px; "><span><?=t('Reset')?></span></a>
	</div>
	
	<div class="ccm-spacer"></div> 
	
	<div class="ccm-note" style="margin-top:16px;">
		<?=t('Note: Styles set here are often overridden by those defined within the various block types.')?>
	</div>		
	
<?
$valt = Loader::helper('validation/token');
$valt->output();
?>
</form>