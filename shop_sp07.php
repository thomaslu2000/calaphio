<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'SHOP');

if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to access the online shop.");
} else {
	echo <<<DOCHERE
<h1>Gamma Gamma Shop!</h1><br />
<h2>Banquet Tickets</h2>
<p>Tickets are no longer available to purchase. If you had reserved one but had not paid yet, please contact one of the Banquet chairs. If you have not contacted us as of 1:30 AM, Tuesday, April 17, then we have not reserved a ticket for you.</p><br />
<h2>Banquet Grams</h2>
<B>BE SURE TO HAVE <a href="http://grams.meloncollie.net/" target="_blank">THIS PAGE</a> OPEN!</B> It will contain instructions on how to submit your grams electronically, and other options as to how you want to turn them in!<br />
<form action="https://checkout.google.com/cws/v2/Merchant/617810478851673/checkout" method="post" name="BB_BuyButtonForm" class="style1" id="BB_BuyButtonForm">
    <table cellpadding="5" cellspacing="0" width="1%">
        <tr>
            <td align="right" width="1%">
                <select name="buyButtonCart">
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjEuMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT4xIEdyYW08L2l0ZW0tbmFtZT4NCiAgICAgICAgPGl0ZW0tZGVzY3JpcHRpb24gLz4NCiAgICAgIDwvaXRlbT4NCiAgICA8L2l0ZW1zPg0KICA8L3Nob3BwaW5nLWNhcnQ+DQogIDxjaGVja291dC1mbG93LXN1cHBvcnQ+DQogICAgPG1lcmNoYW50LWNoZWNrb3V0LWZsb3ctc3VwcG9ydCAvPg0KICA8L2NoZWNrb3V0LWZsb3ctc3VwcG9ydD4NCjwvY2hlY2tvdXQtc2hvcHBpbmctY2FydD4NCg0K//separator//8JRYVx1HgiJGI23tT2pWwNJFKdk=">&#x24;1.00 - 1 Gram</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjIuMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT4yIEdyYW1zPC9pdGVtLW5hbWU+DQogICAgICAgIDxpdGVtLWRlc2NyaXB0aW9uIC8+DQogICAgICA8L2l0ZW0+DQogICAgPC9pdGVtcz4NCiAgPC9zaG9wcGluZy1jYXJ0Pg0KICA8Y2hlY2tvdXQtZmxvdy1zdXBwb3J0Pg0KICAgIDxtZXJjaGFudC1jaGVja291dC1mbG93LXN1cHBvcnQgLz4NCiAgPC9jaGVja291dC1mbG93LXN1cHBvcnQ+DQo8L2NoZWNrb3V0LXNob3BwaW5nLWNhcnQ+DQoNCg==//separator//yppGBwn++eTV2IRxgkfKVmJEhAo=">&#x24;2.00 - 2 Grams</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjMuMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT4zIEdyYW1zPC9pdGVtLW5hbWU+DQogICAgICAgIDxpdGVtLWRlc2NyaXB0aW9uIC8+DQogICAgICA8L2l0ZW0+DQogICAgPC9pdGVtcz4NCiAgPC9zaG9wcGluZy1jYXJ0Pg0KICA8Y2hlY2tvdXQtZmxvdy1zdXBwb3J0Pg0KICAgIDxtZXJjaGFudC1jaGVja291dC1mbG93LXN1cHBvcnQgLz4NCiAgPC9jaGVja291dC1mbG93LXN1cHBvcnQ+DQo8L2NoZWNrb3V0LXNob3BwaW5nLWNhcnQ+DQoNCg==//separator//S1VnlclvUZQ7wXTQYutfCHket+M=">&#x24;3.00 - 3 Grams</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjQuMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT40IEdyYW1zPC9pdGVtLW5hbWU+DQogICAgICAgIDxpdGVtLWRlc2NyaXB0aW9uIC8+DQogICAgICA8L2l0ZW0+DQogICAgPC9pdGVtcz4NCiAgPC9zaG9wcGluZy1jYXJ0Pg0KICA8Y2hlY2tvdXQtZmxvdy1zdXBwb3J0Pg0KICAgIDxtZXJjaGFudC1jaGVja291dC1mbG93LXN1cHBvcnQgLz4NCiAgPC9jaGVja291dC1mbG93LXN1cHBvcnQ+DQo8L2NoZWNrb3V0LXNob3BwaW5nLWNhcnQ+DQoNCg==//separator//tp8nF69JsBSAeDmOiioKBMr6F1M=">&#x24;4.00 - 4 Grams</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjUuMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT42IEdyYW1zIC0gU1BFQ0lBTCE8L2l0ZW0tbmFtZT4NCiAgICAgICAgPGl0ZW0tZGVzY3JpcHRpb24gLz4NCiAgICAgIDwvaXRlbT4NCiAgICA8L2l0ZW1zPg0KICA8L3Nob3BwaW5nLWNhcnQ+DQogIDxjaGVja291dC1mbG93LXN1cHBvcnQ+DQogICAgPG1lcmNoYW50LWNoZWNrb3V0LWZsb3ctc3VwcG9ydCAvPg0KICA8L2NoZWNrb3V0LWZsb3ctc3VwcG9ydD4NCjwvY2hlY2tvdXQtc2hvcHBpbmctY2FydD4NCg0K//separator//YhpzOpk7GfSjb6qpRjRL+jsewb8=">&#x24;5.00 - 6 Grams - SPECIAL!</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjYuMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT43IEdyYW1zPC9pdGVtLW5hbWU+DQogICAgICAgIDxpdGVtLWRlc2NyaXB0aW9uPiQ1IGZvciA2LCBhbmQgdGhlbiAkMSBmb3IgMSA6UDwvaXRlbS1kZXNjcmlwdGlvbj4NCiAgICAgIDwvaXRlbT4NCiAgICA8L2l0ZW1zPg0KICA8L3Nob3BwaW5nLWNhcnQ+DQogIDxjaGVja291dC1mbG93LXN1cHBvcnQ+DQogICAgPG1lcmNoYW50LWNoZWNrb3V0LWZsb3ctc3VwcG9ydCAvPg0KICA8L2NoZWNrb3V0LWZsb3ctc3VwcG9ydD4NCjwvY2hlY2tvdXQtc2hvcHBpbmctY2FydD4NCg0K//separator//GOhjBNXE44u1NW5wtMHRXxrrIdk=">&#x24;6.00 - 7 Grams</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjcuMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT44IEdyYW1zPC9pdGVtLW5hbWU+DQogICAgICAgIDxpdGVtLWRlc2NyaXB0aW9uPiQ1IGZvciA2LCB0aGVuICQyIGZvciAyPC9pdGVtLWRlc2NyaXB0aW9uPg0KICAgICAgPC9pdGVtPg0KICAgIDwvaXRlbXM+DQogIDwvc2hvcHBpbmctY2FydD4NCiAgPGNoZWNrb3V0LWZsb3ctc3VwcG9ydD4NCiAgICA8bWVyY2hhbnQtY2hlY2tvdXQtZmxvdy1zdXBwb3J0IC8+DQogIDwvY2hlY2tvdXQtZmxvdy1zdXBwb3J0Pg0KPC9jaGVja291dC1zaG9wcGluZy1jYXJ0Pg0KDQo=//separator//CVFWslqfDBxnBs9Wnruc0Acuigc=">&#x24;7.00 - 8 Grams</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjguMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT45IEdyYW1zPC9pdGVtLW5hbWU+DQogICAgICAgIDxpdGVtLWRlc2NyaXB0aW9uPiQ1IGZvciA2LCB0aGVuICQzIGZvciAzPC9pdGVtLWRlc2NyaXB0aW9uPg0KICAgICAgPC9pdGVtPg0KICAgIDwvaXRlbXM+DQogIDwvc2hvcHBpbmctY2FydD4NCiAgPGNoZWNrb3V0LWZsb3ctc3VwcG9ydD4NCiAgICA8bWVyY2hhbnQtY2hlY2tvdXQtZmxvdy1zdXBwb3J0IC8+DQogIDwvY2hlY2tvdXQtZmxvdy1zdXBwb3J0Pg0KPC9jaGVja291dC1zaG9wcGluZy1jYXJ0Pg0KDQo=//separator//PrM9k4BQ65hbMvM9OG4LeaVL5uc=">&#x24;8.00 - 9 Grams</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjkuMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT4xMCBHcmFtczwvaXRlbS1uYW1lPg0KICAgICAgICA8aXRlbS1kZXNjcmlwdGlvbj4kNSBmb3IgNiwgdGhlbiAkNCBmb3IgNDwvaXRlbS1kZXNjcmlwdGlvbj4NCiAgICAgIDwvaXRlbT4NCiAgICA8L2l0ZW1zPg0KICA8L3Nob3BwaW5nLWNhcnQ+DQogIDxjaGVja291dC1mbG93LXN1cHBvcnQ+DQogICAgPG1lcmNoYW50LWNoZWNrb3V0LWZsb3ctc3VwcG9ydCAvPg0KICA8L2NoZWNrb3V0LWZsb3ctc3VwcG9ydD4NCjwvY2hlY2tvdXQtc2hvcHBpbmctY2FydD4NCg0K//separator//eFJ+ZAVbFS7bOwWlI7q+dqbzyPo=">&#x24;9.00 - 10 Grams</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjEwLjA8L3VuaXQtcHJpY2U+DQogICAgICAgIDxpdGVtLW5hbWU+MTIgR3JhbXMgLSBTUEVDSUFMISE8L2l0ZW0tbmFtZT4NCiAgICAgICAgPGl0ZW0tZGVzY3JpcHRpb24+QXQgdGhpcyBwb2ludCBJIG1pZ2h0IGZvcmNlIHlvdSB0byBqdXN0IGJ1eSAxMiwgZXZlbiBpZiB5b3Ugb25seSB3YW50IDExIDpQPC9pdGVtLWRlc2NyaXB0aW9uPg0KICAgICAgPC9pdGVtPg0KICAgIDwvaXRlbXM+DQogIDwvc2hvcHBpbmctY2FydD4NCiAgPGNoZWNrb3V0LWZsb3ctc3VwcG9ydD4NCiAgICA8bWVyY2hhbnQtY2hlY2tvdXQtZmxvdy1zdXBwb3J0IC8+DQogIDwvY2hlY2tvdXQtZmxvdy1zdXBwb3J0Pg0KPC9jaGVja291dC1zaG9wcGluZy1jYXJ0Pg0KDQo=//separator//Wam9ElRPXrFRLRyllg74vXYRzDw=">&#x24;10.00 - 12 Grams - SPECIAL!!</option>
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjE1LjA8L3VuaXQtcHJpY2U+DQogICAgICAgIDxpdGVtLW5hbWU+MTggR3JhbXMgLSBTUEVDSUFMITwvaXRlbS1uYW1lPg0KICAgICAgICA8aXRlbS1kZXNjcmlwdGlvbiAvPg0KICAgICAgPC9pdGVtPg0KICAgIDwvaXRlbXM+DQogIDwvc2hvcHBpbmctY2FydD4NCiAgPGNoZWNrb3V0LWZsb3ctc3VwcG9ydD4NCiAgICA8bWVyY2hhbnQtY2hlY2tvdXQtZmxvdy1zdXBwb3J0IC8+DQogIDwvY2hlY2tvdXQtZmxvdy1zdXBwb3J0Pg0KPC9jaGVja291dC1zaG9wcGluZy1jYXJ0Pg0KDQo=//separator//92tpK4OHjwOlUr5swPqYHLTz/To=">&#x24;15.00 - 18 Grams - SPECIAL!</option>
                </select>
            </td>
            <td align="left" width="1%">
                <input alt="" src="https://checkout.google.com/buttons/buy.gif?merchant_id=617810478851673&amp;w=121&amp;h=44&amp;style=white&amp;variant=text&amp;loc=en_US" target="_blank" type="image"/>
            </td>
        </tr>
    </table>
</form>

<p></p>
<h2>Funpack</h2>
<p>Your memories cleverly put together by the creative side of APO. Includes reflections from ExComm and Pcomm, Senior Farewells, the best pledge test answers, ads, and more! All for $5. You really cannot beat that.</p>
<form action="https://checkout.google.com/cws/v2/Merchant/617810478851673/checkout" id="BB_BuyButtonForm" method="post" name="BB_BuyButtonForm">
    <table cellpadding="5" cellspacing="0" width="1%">
        <tr>
            <td align="right" width="1%">
                <select name="buyButtonCart">
                    <option value="PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4NCjxjaGVja291dC1zaG9wcGluZy1jYXJ0IHhtbG5zPSJodHRwOi8vY2hlY2tvdXQuZ29vZ2xlLmNvbS9zY2hlbWEvMiI+DQogIDxzaG9wcGluZy1jYXJ0Pg0KICAgIDxpdGVtcz4NCiAgICAgIDxpdGVtPg0KICAgICAgICA8cXVhbnRpdHk+MTwvcXVhbnRpdHk+DQogICAgICAgIDx1bml0LXByaWNlIGN1cnJlbmN5PSJVU0QiPjUuMDwvdW5pdC1wcmljZT4NCiAgICAgICAgPGl0ZW0tbmFtZT5GdW5wYWNrITwvaXRlbS1uYW1lPg0KICAgICAgICA8aXRlbS1kZXNjcmlwdGlvbiAvPg0KICAgICAgPC9pdGVtPg0KICAgIDwvaXRlbXM+DQogIDwvc2hvcHBpbmctY2FydD4NCiAgPGNoZWNrb3V0LWZsb3ctc3VwcG9ydD4NCiAgICA8bWVyY2hhbnQtY2hlY2tvdXQtZmxvdy1zdXBwb3J0IC8+DQogIDwvY2hlY2tvdXQtZmxvdy1zdXBwb3J0Pg0KPC9jaGVja291dC1zaG9wcGluZy1jYXJ0Pg0KDQo=//separator//9l+WSwIVcP+479ARwgWi3YYpBaA=">&#x24;5.00 - Funpack!</option>
                </select>
            </td>
            <td align="left" width="1%">
                <input alt="" src="https://checkout.google.com/buttons/buy.gif?merchant_id=617810478851673&amp;w=121&amp;h=44&amp;style=white&amp;variant=text&amp;loc=en_US" type="image"/>
            </td>
        </tr>
    </table>
</form>

<br /><br />
<p><b>But why Google Checkout? I have PayPal!</b><br />
For a number of reasons; first of all because PayPal has very "interesting" definitions of what they could suspect to be fraudulent funds, so as a result my money could be taken away at any given moment for no reason. Also, there's a fee pressed against sellers for every transaction made. Until 2008, Google Checkout is free. So don't hesitate to open a Google Checkout account. They're super awesome :)
</p>
<p>P.S. Google Checkout doesn't disclose your credit card numbers to me, in case you were wondering! :P</p>
DOCHERE;
}

Template::print_body_footer();
Template::print_disclaimer();
?>