see the [PHP root readme](../README.md) instead of this

# Notable deviations from the guide
* I used sail to create my blank project all containerised, not direct herd
    * This also means where they go to `ping.test`, I'm going to `localhost`
* I'm on a newer PHP than they are, so didn't nudge composer
* I had to manually install breeze and then it's "API only" mode
* Tutor called his project "ping" and I called mine "TrebbleAPI"
* I'm using POSTMan and not aspen (shouldn't be visally important here but eh)
* I'm skipping the local cert step, overkill for a pet project