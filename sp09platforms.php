<?php
require("include/includes.php");
require("include/Calendar.class.php");
require("include/Template.class.php");
Template::print_head(array());
Template::print_body_header('Home', 'NEWS');
if (!$g_user->is_logged_in()) {
	trigger_error("You must be logged in to view the election platforms.", E_USER_ERROR);
} else {
	echo <<<HEREDOC
<div style="font-size: 1.5em; font-weight: bold; margin-bottom: 1em;">
Spring 2009 Election Platforms
</div>

<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Service Vice President: <span style="font-weight: normal;"></span>
</div>
<p style="margin: 1.5em 0px;">
</p>
<br>


<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Pledgemaster: <span style="font-weight: normal;">Julie Truong</span>
</div>
<div style="line-height: 1.5;">
<p style="margin: 1.5em 0px;">
In my past three semesters involved in Alpha Phi Omega, I have grown greatly as a person and have gained a lot of self-worth and confidence through my experience with leadership, friendship and service. Because of this, I want to give back to the chapter in the way I feel I can best: as Pledgemaster.
</p>
<p style="margin: 1.5em 0px;">
As Pledgemaster, not only will I be able to guide future pledges in carrying on our chapter's traditions, but through a united pledge class, I will be able to inspire a sense pride echoing from the pledge class to the rest of the chapter. With the common goal of having their pledge class succeed, the pledges will create unity and pride for their pledge class. In addition, not only will pride inspire success as a pledge but it will also serve as motivation, not wanting to disappoint fellow brothers which will result in a strong, united pledge class. Once these pledges become actives their pride for their pledge class will be extended to the rest of the chapter, insuring Gamma Gamma in future generations.
</p>
<p style="margin: 1.5em 0px;">
As Pledgemaster, I want to create an environment that allows future pledges to experience a pledging semester where they feel welcome and important to the chapter. Once a pledge feels important in the chapter, they gain a sense of pride and build strong ties in the chapter community. This sense of value to the chapter, I believe, starts with a united pledge committee. Being Co-Leadership Committee trainer this semester has taught me a lot, not only about leading a committee, but also in building a cohesive partnership with my co-trainer as well as all of the other members of P-Comm. I have learned about myself and my own strengths and weaknesses and how I interact with different people. With this experience I feel that I will be able to build a pledge committee prepared to instill pride in the chapter and its traditions.
</p>
<p style="margin: 1.5em 0px;">
In addition to creating unity and pride within the chapter, as Pledgemaster I will be also be able to give back to the deserving brothers chosen as my pledge committee, by guiding them through the semester as members of P-Comm in hopes that they will gain as much as I have this semester.
</p>
</div>
<br>


<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
  Administrative Vice President: <span style="font-weight: normal;">Diny Huang</span>
</div>
<div style="line-height: 1.5;">
<p style="margin-top: 1.2em; font-weight: bold;">OBJECTIVE</p>
  <p style="margin-bottom: 1.2em;">
    My platform is entitled "<strong>My Aphio</strong>," because I want to create a personalized, more interactive experience for <em style="font-style: italic;">you</em>, the Gamma Gamma chapter. My qualifications include office experience in an administrative position at my on campus job and actively promoting the values of  Leadership, Friendship, and Service within the APO chapter. I look forward to room reservations, slideshows, and finding opportunities to expand my role.
  </p>
  <p style="margin-top: 1.2em; font-weight: bold;">PLATFORM</p>
  <p>
    <strong>Interaction</strong>&mdash;My goal is to find new avenues through which the brothers can interact with one another. I will create a chapter blog, where random brothers are highlighted so that we can learn more about each other.
  </p>
  <p>
    <strong>Communication</strong>&mdash;As Admin VP, I plan on making APO documents more accessible, such as putting the national pledge manual and the Steps to Chairing in a prominent place on our website. I promise to respond to emails within 48 hours, and hope to continue to decrease the spam sent to our mailing list.
  </p>
  <p>
    <strong>Enhancement</strong>&mdash;I plan on looking for ways to expand the role of Admin VP beyond room reservations and creating slideshows to being a support for the other members of ExComm, and to find ways to enhance the development of the chapter. I want to promote academic and career opportunities to benefit the brothers.
  </p>
  <p style="margin-top: 1.2em; font-weight: bold;">ACCOMPLISHMENTS</p>
  <ul style="list-style: outside disc; padding-left: 3em;">
    <li>Pledge Oak | Spring 2008</li>
    <li>Active Spotlight | Fall 2008</li>
    <li>Sturdy Oak | Fall 2008</li>
    <li style="width: 51em;">Placed over 10 fellowships per semester on the calendar, including Boba Run, Study for Pledge Test, &amp; Fatty Fridays | Spring 2009 &amp; Fall 2008</li>
  </ul>
  <p style="margin-top: 1.2em; font-weight: bold;">CHAIRED</p>
  <dl>
    <dt><strong>Assassins Chair</strong> | Spring 2009 Fall 2008</dt>
    <dd>
      <ul style="list-style: outside disc; padding-left: 3em;">
        <li>Create a spreadsheet of 100+ AphiO players and started a blog to create a more bonding and networking</li>
        <li>Developed new rules in collaboration with co-chair to engage and excite the chapter through these changes</li>
        <li>Create an system of clear rules, emailing the players of natural disasters and Assassins updates</li>
      </ul>
    </dd>
    <dt><strong>Active Retreat Chair</strong> | Spring 2009</dt>
    <dd>
      <ul style="list-style: outside disc; padding-left: 3em;">
        <li>Organized a 2 day Tahoe retreat to let actives build comradeship in a stress-free, off-campus environment</li>
        <li>Developed an itinerary, grocery list, and estimated snowboarding prices to manage the event</li>
      </ul>
    </dd>
    <dt><strong>Chief Email Officer</strong> | Spring 2009</dt>
    <dd>
      <ul style="list-style: outside disc; padding-left: 3em;">
        <li>Moderate and post all email messages sent to the chapter mailing list by sending only relevant messages</li>
        <li>Assisted current Admin VP with supervising all incoming messages within 5 hours of being sent</li>
      </ul>
    </dd>
  </dl>
</div>
<br>

<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Membership Vice President: <span style="font-weight: normal;"></span>
</div>
<div style="line-height: 1.5;">
<p style="margin: 1.5em 0px; line-height: 1.5;">
</p>
</div>
<br>

<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Fellowship Vice President: <span style="font-weight: normal;"></span>
</div>
<div style="line-height: 1.5;">
<p style="margin: 1.5em 0px; line-height: 1.5;">
</p>
</div>
<br>

<div style="font-size: 1.3em; font-weight: bold; border-bottom: solid 1px black;">
Historian: <span style="font-weight: normal;"></span>
</div>
<div style="line-height: 1.5;">
<p style="margin: 1.5em 0px; line-height: 1.5;">
</p>
</div>
<br>
HEREDOC;
}
Template::print_body_footer();
Template::print_disclaimer();
?>