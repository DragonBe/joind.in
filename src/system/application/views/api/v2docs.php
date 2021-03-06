<?php menu_pagetitle('API v2 Documentation'); ?>

<h1>API Docs: V2 API</h1>

<h2>Overview</h2>

<p>Joind.in is offering an HTTP web service to give clean, robust access to the data contained in the application to consuming devices.  It follows a RESTful style, is available in HTML and JSON formats, and uses OAuth v1.0a for authentication where this is needed (all data publicly visible on the site is available via the API without authentication).  Hyperlinks are provided the responses to allow you to easily locate related data.

This document gives information about the functionality of the API and how to use it.</p>


<h2>Global Parameters</h2>

<p>There are a few parameters supported on every request:
<ul><li><b>verbose: </b> set to <b>yes</b> to see a more detailed set of data in the responses</li>
<li><b>start: </b> for responses which return lists, this will offset the start of the result set which is returned.  Use in conjuction with <b>resultsperpage</b></li>
<li><b>resultsperpage: </b>for responses which return lists, set how many results will be returned.  Use with <b>start</b> to get large result sets in manageable chunks</b></li>
<li><b>format: </b>set this to <b>html</b> or <b>json</b> to specify what format the response should be in.</li>
</ul></p>


<h2>Data Formats</h2>

<p>The service currenty supports <b>JSON</b> and <b>HTML</b> only, although these can very easily be expanded upon in future.  The service will guess from your accept header which format you wanted.  In the event that this is not working correctly then simply add the <b>format</b> parameter to specify which format should be returned.</p>

<p>Where there are links to other resources, and for pagination, you will find those links as part of the response.  The pagination links look something like this:
<blockquote>
<ul>
<li><strong>meta:</strong> <ul>

<li><strong>count:</strong> 20</li>

<li><strong>this_page:</strong> <a href="http://api.joind.in/v2/events/603/talks?resultsperpage=20&amp;start=0">http://api.joind.in/v2/events/603/talks?resultsperpage=20&amp;start=0</a></li>

<li><strong>next_page:</strong> <a href="http://api.joind.in/v2/events/603/talks?resultsperpage=20&amp;start=20">http://api.joind.in/v2/events/603/talks?resultsperpage=20&amp;start=20</a></li>

</ul>

</li>

</ul>

</blockquote>

<h2>Service Detail</h2>

<p>Examples shown in HTML format.  The JSON response holds identical data, passed through json_encode rather than pretty-printed</p>

<h3>Request: GET /</h3>

<p><a href="http://api.joind.in">try it</a></p>

This is your starting point and will show you where you can go:
<blockquote>
<strong>events: </strong><a href="http://api.joind.in/v2/events">http://api.joind.in/v2/events</a><br />

<strong>count: </strong>1<br />
</blockquote>
<p>Events lists can also accept the following values for <b>filter</b>:
<ul>
    <li><b>hot</b>: current and popular events (<a href="http://api.joind.in/v2/events?filter=hot">try it</a></li>
    <li><b>upcoming</b>: future events, soonest first (<a href="http://api.joind.in/v2/events?filter=upcoming">try it</a></li>
    <li><b>past</b>: past events, most recent first (<a href="http://api.joind.in/v2/events?filter=past">try it</a></li>

<h3>Request: GET /v2/events</h3>
<h3>Request: GET /v2/events/[id]</h3>

<p><a href="http://api.joind.in/v2/events">try it</a></p>

<p>Shows a list of events, sorted by start time descending.  We will offer other views of events, with different filters and sorting, in time.

Each result looks something like this:</p>
<blockquote>
<ul>

<li><strong>0:</strong> <ul>

<li><strong>event_id:</strong> 603</li>

<li><strong>name:</strong> Dutch PHP Conference 2011</li>

<li><strong>start_date:</strong> 2011-05-18T22:00:00+00:00</li>

<li><strong>end_date:</strong> 2011-05-21T21:59:59+00:00</li>

<li><strong>description:</strong> Ibuildings is proud to organise the fifth Dutch PHP Conference on May 20 and 21, plus a pre-conference tutorial day on May 19. Both programs will be completely in English so the only Dutch thing about it is the location. Keywords for these days: Know-how, Technology, Best Practices, Networking, Tips &amp; Tricks.</li>

<li><strong>href:</strong> <a href="http://www.phpconference.nl/">http://www.phpconference.nl/</a></li>

<li><strong>icon:</strong> icon-90x90.png</li>

<li><strong>uri:</strong> <a href="http://api.joind.in/v2/events/603">http://api.joind.in/v2/events/603</a></li>

<li><strong>verbose_uri:</strong> <a href="http://api.joind.in/v2/events/603?verbose=yes">http://api.joind.in/v2/events/603?verbose=yes</a></li>

<li><strong>comments_link:</strong> <a href="http://api.joind.in/v2/events/603/comments">http://api.joind.in/v2/events/603/comments</a></li>

<li><strong>talks_link:</strong> <a href="http://api.joind.in/v2/events/603/talks">http://api.joind.in/v2/events/603/talks</a></li>

</ul>

</li>

</ul>

</blockquote>

<h3>Request: GET /events/[id]/talks</h3>
<h3>Request: GET /talks/[id]</h3>

<p><a href="http://api.joind.in/v2/events/110/talks">try it</a></p>

<p>Following the link to the talks for an event gives a list.  The <b>format</b>, <b>start</b> and <b>requestsperpage</b> parameters are valid.  Each talk entry will look something like this:</p>

<blockquote>
<ul><li><strong>9:</strong> <ul>

<li><strong>talk_id:</strong> 3219</li>

<li><strong>event_id:</strong> 603</li>

<li><strong>talk_title:</strong> ZeroMQ Is The Answer</li>

<li><strong>talk_description:</strong> Using Mikko Koppanen's PHP ZMQ extension we will look at how you can easily distribute work to background processes, provide flexible service brokering for your next service oriented architecture, and manage caches efficiently and easily with just PHP and the ZeroMQ libraries. Whether the problem is asynchronous communication, message distribution, process management or just about anything, ZeroMQ can help you build an architecture that is more resilient, more scalable and more flexible, without introducing unnecessary overhead or requiring a heavyweight queue manager node.

</li>

<li><strong>start_date:</strong> 2011-05-20T08:45:00+00:00</li>

<li><strong>speaker_name:</strong> Ian Barber</li>

<li><strong>uri:</strong> <a href="http://api.joind.in/v2/talks/3219">http://api.joind.in/v2/talks/3219</a></li>

<li><strong>verbose_uri:</strong> <a href="http://api.joind.in/v2/talks/3219?verbose=yes">http://api.joind.in/v2/talks/3219?verbose=yes</a></li>

<li><strong>comments_link:</strong> <a href="http://api.joind.in/v2/talks/3219/comments">http://api.joind.in/v2/talks/3219/comments</a></li>

<li><strong>event_link:</strong> <a href="http://api.joind.in/v2/events/603">http://api.joind.in/v2/events/603</a></li>

</ul></li></ul>
</blockquote>



