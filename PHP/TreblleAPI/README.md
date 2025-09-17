see the [PHP root readme](../README.md) instead of this

# Notable deviations from the guide
* I used sail to create my blank project all containerised, not direct herd
    * This also means where they go to `ping.test`, I'm going to `localhost`
* I'm on a newer PHP than they are, so didn't nudge composer
* I had to manually install breeze and then it's "API only" mode
* Tutor called his project "ping" and I called mine "TrebbleAPI"
* I'm using POSTMan and not aspen (shouldn't be visally important here but eh)
* I'm skipping the local cert step, overkill for a pet project

# How to run, incase of revisiting
* Make sure the mac it's run from has PHP (needed for Sail not running of code), Composer (you could skip this but imo it's not worth the hassle) & Docker
* Go to the project root in CLI of choice
* It's never-production code, the .env.example has everyhting but the APP_KEY. so you can generate the .env without secret management
* `./vendor/bin/sail up` should now work (@todo remove couched lanaguage if I end up testing this)
* `./vendor/bin/sail artisan key:generate` will now get you the APP_KEY you're missing
* `./vendor/bin/sail artisan migrate` should get you're DB populated
* `./vendor/bin/sail test` to run the tests and make sure nothing is missing or broken