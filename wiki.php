<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Brothers', 'WIKI');
?>

<?php
	if (!$g_user->is_logged_in()) {
		trigger_error("You must be logged in to view the wiki.", E_USER_ERROR);
	}
?>

<?php if ($g_user->is_logged_in()): ?>
	<h1 align="center">Welcome to the Gamma Gamma Wiki!</h1>
	<br>
	The goal of the Gamma Gamma Wiki is to record the history of our chapter where it is accessible to all the actives and pledges. It was created during JS semester Spring 2012 by Chapter Historian Toshiki Nakashige (KS). If you have any feedback regarding the Wiki, please message the Wiki Chairs at ggwiki@googlegroups.com. Thanks!
    <br>
	<br>
    

    <h2 align="center">By Category</h2>
	<table border="1" align="center" width="70%">
	<tr><td align="center">Distinguished Service Key</td></tr>
    <tr><td align="center">Executive Committee</td></tr>
    <tr><td align="center">Regionals and Sectionals</td></tr>
    <tr><td align="center">Family System</td></tr>
	</table>
    <br>
    <br>
    
    <h2 align="center">By Semester</h2>
	<table border="1" align="center" width="70%">
	<tr><td align="center">Stan Carpenter (SC)</td></tr>
    <tr><td align="center">Gilbert K. Lee (GKL)</td></tr>
    <tr><td align="center">Robert C. Barkhurst (RCB)</td></tr>
    <tr><td align="center">Joe Yang (JY)</td></tr>
    <tr><td align="center">Robert J. Hillard (RJH)</td></tr>
    <tr><td align="center">Jerry Jahow Jen (JJJ)</td></tr>
    <tr><td align="center">George Dacy (GD)</td></tr>
    <tr><td align="center">Jenny S. Chang (JSC)</td></tr>
    <tr><td align="center">Ray Hancock (RH)</td></tr>
    <tr><td align="center">Annie Chung (AC)</td></tr>
    <tr><td align="center">Togo West (TW)</td></tr>
    <tr><td align="center">Tina Tjahja (TT)</td></tr>
    	<tr><td align="center"><a href="ggwiki_gas.php">Gerald A. Schroeder (GAS)</a></td></tr>
    	<tr><td align="center"><a href="ggwiki_dw.php">Derek Wang (DW)</a></td></tr>
    	<tr><td align="center"><a href="ggwiki_kw.php">Kate Westlake (KW)</a></td></tr>
    	<tr><td align="center"><a href="ggwiki_mln.php">My Linh Nguyen (MLN)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_jcj.php">Jack C. Jadel (JCJ)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_cc.php">Chris Cheuk (CC)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_wk.php">Wilfred Krenek (WK)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_st.php">Sheehan Tejamo (ST)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_jm.php">Jack McKenzie (JM)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_gl.php">Geoffrey Lee (GL)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_jlc.php">James L. Chandler (JLC)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_ks.php">Katherine Strausser (KS)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_cpz.php">Charles P. Zlatkovich (CPZ)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_js.php">Jennifer Sun (JS)</a></td></tr>
	<tr><td align="center"><a href="ggwiki_fa12.php">Maura Harty (MH)</a></td></tr>
	</table>
    
    <br>
    <br>
    
    <h2>Gamma Gamma Wiki Chairs</h2>
	<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>JS:</b> Victor Chang (CPZ), Stephen Hom (GL)<br>
    <br>
    <br>
    

<!--
	<br>
	Option 2:
	<br><br>

	<table border="1" align="center" width="100%">
	<tr>
	<th>Semester</th>
	<th>President</th>
	<th>Admin VP</th>
	<th>Membership VP</th>
	<th>Service VP</th>
	<th>Fellowship VP</th>
	<th>Finance VP</th>
	<th>Pledgemaster</th>
	<th>Historian</th>
	</tr>
	<tr>
	<td>...</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr><td align="center">JCJ</td></tr>
	<tr><td align="center">CC</td></tr>
	<tr><td align="center">WK</td></tr>
	<tr><td align="center">ST</td></tr>
	<tr><td align="center">JM</td></tr>
	<tr><td align="center">GL</td></tr>
	<tr><td align="center">JLC</td></tr>
	<tr><td align="center">KS</td></tr>
	</table>
-->
<?php endif ?>
<?php
Template::print_body_footer();
Template::print_disclaimer();
?>