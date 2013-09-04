#Nice_time

A fork of [pvledoux Nice Time plugin](https://github.com/pvledoux/Nice_time.ee2_addon) with multilanguage features

There are two ways to use this

## {exp:nice_time:convert}

Use this if you only plan to convert only one date

### Syntax
------------------------------------------------------------------

{exp:nice_time:convert date="{entry_date}"}
{exp:nice_time:convert date="2012-09-{segment_3}"}
{exp:nice_time:convert date="+3 days"}

### Parameter
------------------------------------------------------------------

date	Can be a string date or a unix timestamp.

## {exp:nice_time_convert_multiple}

Use this if you plan to convert more than one date.
This is not part of the core functionality. Rather, I created this to fit some of my needs(API related stuff)
I will be updating this in future so that it can accept params.

### Syntax
------------------------------------------------------------------
{exp:nice_time:convert_multiple}
	{converted_date_list}
		{datetime}
		{time_ago}
	{/converted_date_list}
{/exp:nice_time:convert_multiple}

### Parameter
------------------------------------------------------------------
None.	The actual list of dates is passed via POST in this format, "datetime1|datetime2|datetime3|..."
		e.g. "2013-08-23T20:37:21+12:00|2013-08-22T19:08:29+12:00"	

## Differences from the original project
* Multilanguage Support
* Removed format, relative and prefix parameters. This is because all of these are now defined in the language files. 

## TODOs
* Implement multilanguage support when outputting actual date as opposed to "time ago" phrases
* In {exp:nice_time:convert_multiple}, make so that it accepts datetime param

##Licence
Copyright (c) 2012, Pv Ledoux All rights reserved.
Copyright (c) 2013, Arthur Vincent Simon All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
* Neither the name of the <organization> nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.