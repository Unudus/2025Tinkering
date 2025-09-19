Currently a blank Laravel Sail setup, made for a future event scheduling project see the TrebbleAPI [readme](../TreblleAPI/README.md) for setup notes when I pick this up

Future goals
* Laravel handles the API only, Separate repo & codebase for UX ( to mirror most popular 'real' system pattern)
    * Perhaps leave the "web" paths in for admin, air-gap them from "user" UX
* votes close when 70% (config controlled threshold) of users support an option (first past the post). All 3 votes closing locks event in
* no 'maybes' or couched options.
* Verbages
    * Events
        * Create event, 
        * invite other users to event
        * accept / decline invite to event
        * view upcoming events
        * view event details (voting states, users etc)
        * cancel upcoming event
    * Datetimes
        * Nominate datetime
        * view suggested datetimes
        * Support nominated datetime
    * Locations
        * nominate location
        * view suggested locations
        * Support nominated location
    * Activities
        * Nominate activity
        * view suggested activities
        * Support nominated activity
    

* Expanded complexities to consider
    * track activities 'owned' by a user (specific board/video game, or regular event they host like film-night), for ease-of-use & expanded information offering (e.g. links to "how to" videos)
    * rolling events (weekly game nights etc)
    * track bringables/requirements (snacks, source books for TTRPG, hardwaring clothes etc)
    * Event requesting (e.g. user wants another to host a specific event)
    * Non-user attendants (+1s, kids etc)
    * tagging system for event (Byob, kid-friendly etc)... maybe activity/location/time specific?
    * takebacks, like no longer wanting a time or event?
    * User management (nice to have)
    * Soft/Hard deletes & soft-delete-new-collisions (admin)