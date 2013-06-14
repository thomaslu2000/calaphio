<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'SHOP');

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to access the online shop.");
} else if (strtotime("now") >= strtotime("2008-04-29")) {
	echo <<<DOCHERE
<h2>Banquet Tickets!</h2>
<p style="margin-bottom: 1.2em;">Banquet registration is now closed. Please talk to Vivian Lee-Su if you have not purchased your ticket.</p>

DOCHERE;
} else {
	echo <<<DOCHERE
<h2>Banquet Tickets!</h2>
<p style="margin-bottom: 1.2em;">Banquet ticket prices are: \$45 for actives/alumni/pledges and \$47 for bad-standing actives, plus an online transaction fee. Select the appropriate option from below, and don't cheat because I know where you live!</p>
<p style="margin-bottom: 1.2em;">If you do not want to pay the online transaction fee, you may pay one of the Banquet Comm chairs in-person (Debbie, Tracy, and Vivian).</p>
<p style="margin-bottom: 1.2em;"><strong>Important:</strong> If your name is not the same as the one on your credit card, let Vivian Lee-Su know via e-mail (<a href="mailto:vleesu@berkeley.edu">vleesu@berkeley.edu</a>), messenger pigeon, or whatever communication medium you use.</p>
<form action="https://checkout.google.com/cws/v2/Merchant/960944723150448/checkoutForm" id="BB_BuyButtonForm" method="post" name="BB_BuyButtonForm">
    <table cellpadding="5" cellspacing="0" width="1%">
        <tr>
            <td align="right" width="1%">
								
                <select name="item_selection_1">
                    <option value="1">$48.16 - Bad Standing Active</option>
                    <option value="2">$46.12 - Actives/Alumni/Pledges</option>
                </select>
                <input name="item_option_name_1" type="hidden" value="Bad Standing Active"/>
                <input name="item_option_price_1" type="hidden" value="48.16"/>
                <input name="item_option_description_1" type="hidden" value=""/>
                <input name="item_option_quantity_1" type="hidden" value="1"/>
                <input name="item_option_currency_1" type="hidden" value="USD"/>
                <input name="item_option_name_2" type="hidden" value="Actives/Alumni/Pledges"/>
                <input name="item_option_price_2" type="hidden" value="46.12"/>
                <input name="item_option_description_2" type="hidden" value=""/>
                <input name="item_option_quantity_2" type="hidden" value="1"/>
                <input name="item_option_currency_2" type="hidden" value="USD"/>
            </td>
            <td align="left" width="1%">
                <input alt="" src="https://checkout.google.com/buttons/buy.gif?merchant_id=960944723150448&amp;w=117&amp;h=48&amp;style=white&amp;variant=text&amp;loc=en_US" type="image"/>
            </td>
        </tr>
    </table>
</form>

DOCHERE;
}

Template::print_body_footer();
Template::print_disclaimer();
?>