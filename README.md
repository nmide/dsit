# dsit
dead simple incident tracking (dead simple IT)

For now I am mostly just storing this here for my own use, but if anyone finds
this and wants to try it:

- Create an SQLite database file in core/dsdb.sql
- Use the create_blank_db.sql script to create the table
- Change directory to public_html
- Run: php -S <hostname:port> 

Connect to the address you used above to try it out.

At the time of this writing only submitting resolved incidents works.
I plan to add a separate 'updates' table and have a proper start to finish
style workflow where you open a ticket, add updates to it, and then close it
off by adding a resolution.

