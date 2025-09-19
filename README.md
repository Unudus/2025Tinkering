# 2025Tinkering
bundled projects, tutorials and small code tinkers, as part of staying fresh &amp; hands on. Likely to be left unfinished &amp; messy like all good learning exercies end up

---

## Rolling commentary

Just to keep sane during the fun of setup & following courses, I'm going to capture some thoughts in a rough, rolling format, but I'll separate out language specifics to help future me

### General

* WSL2 is much better than a few years ago, but it feels like every tutorial starts off with a dependacy assumed. Just getting to something routine like a vanilla Laravel install was hours of catching errors from stale install steps
    * it's also a brain melter sometimes with docker. Turtles all the way down
    * As a result I'm avoiding testing my setup notes too much (likely to be subject to change & breaks momentum towards code refreshing)
* VSC is solid, but after years of using the Atalassian IDEs I miss scratchpads more than I thought. Also it didn't have autosave on by default
    * Also the muscle memory for cmd+click is intense. I'm going to avoid learning VSC shortcuts for now, it doesn't hurt to be more intentional with my typing
    * It's a little annoying that because I'm using my windows machine, wsl et al, that the IDE can't see thing like the php exec path. Solvable if I install locally, or run VSC from wsl, but I can live without the features for a while. 
        * I can always revisist this and look at some of the suggestions online for funneling directly into a container's PHP instead of needing PHP installed on the wsl layer, but that seems like a project unto itself.
* Wow markdown completely fell out my head, these rolling notes will be a nice way of reminding myself of at least the basics
* 1st Project, as they often do, turned into a side exercise/refresher in docker. [This](https://medium.com/@victoria.kruczek_15509/create-a-local-database-with-docker-compose-and-view-it-in-mysql-workbench-974aee047874) guide was handy and I'll likely reuse as future exercises get containerised
    * One I forget : think about if you want to let docker manage its own volume or create an explicit host-system-dir thats mounted for persistent data
* fun gotcha Postman was ignoring the proxy, causing localhost/ to return an old partially configured apache setup. It's simple enough to expliclity proxy via localhost though
* Going through PHP's Trebble guide and the tutor is using the old BREAD (Browse, Read, Edit, Add, Delete) term. Thought that was betamax to CRUD, interesting to hear it still being used

### PHP
see the [readme](PHP/readme.md)

### Typescript

*
*

### C#

*
*

### Python

*
*