#Pvl Nice_time v.0.2

This plugin converts a date in relative time.
It will output **'now'** if the date given is less then 5 seconds ago, **'xx unit ago'** will be outputted for longer intervals (where unit will be seconds, minutes, hours, days or weeks). If the date is greater than 4 weeks, it will return the full date formatted with the parameter _format_.

##Syntax

    {exp:nice_time date="{entry_date}" format="%d-%m-%Y %H:%i"}

##Parameter

<table>
<tr>
	<td><b>date</b></td>
	<td>is required. Can be a string date or a unix timestamp.</td>
</tr>
<tr>
	<td><b>format</b></td>
	<td>optional (default: %d-%m-%Y %H:%i)</td>
</tr>
</table>

##Future improvements

* Allow to translate the output
* Add parameters for the delay between the 'now', the 'xx unit ago' ouput and the normal date output
* Allow the use of tag pairs or single tag

Any improvement or remarks are welcome.



##Licence
Copyright (c) 2012, Pv Ledoux All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
* Neither the name of the <organization> nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.