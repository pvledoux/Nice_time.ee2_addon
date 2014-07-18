#Pvl Nice_time v.0.2

This plugin converts a date to relative time.
It will output **'now'** if the date given is less then 5 seconds ago, **'xx unit ago'** will be output for longer intervals (where unit will be seconds, minutes, hours, days or weeks). If the date is greater than 4 weeks, it will return the full date formatted with the parameter _format_.

##Syntax

    {exp:nice_time date="{entry_date}" format="%d-%m-%Y %H:%i"}
    {exp:nice_time date="2012-09-{segment_3}" format="%D, %M %j, %Y" relative="no"}
    {exp:nice_time date="+3 days" format="<strong>%l</strong> %m/%d/%Y" relative="no"}

It will output these kinds of results:

    now
    30 seconds ago
    5 minutes ago
    2 days ago
    3 weeks ago
    30 seconds from now
    5 minutes from now
    2 days from now
    3 weeks from now
    11-12-2012 11:24
    Monday, September 6, 2012

depending on the interval.

##Parameter

<table>
<tr>
	<td><b>date</b></td>
	<td>is required. Can be a string date or a unix timestamp.</td>
</tr>
<tr>
	<td><b>format</b></td>
	<td>optional. See http://expressionengine.com/user_guide/templates/date_variable_formatting.html (default: %d-%m-%Y %H:%i)</td>
</tr>
<tr>
	<td><b>relative</b></td>
	<td>optional. Set to "no" to always use format.</td>
</tr>
</table>

##Future improvements

* Add parameters for the delay between the 'now', the 'xx unit ago' ouput and the normal date output
* Allow the use of tag pairs or single tag (to ease translation)
* Add parameter to set on which time the plugin must based the ouput (GMT, server time, etc)

Any improvement or remarks are welcome.



##Licence
Copyright (c) 2014, Pv Ledoux All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
* Neither the name of the <organization> nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
