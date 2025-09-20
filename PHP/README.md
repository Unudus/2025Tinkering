# PHP bits

repos specifically around brushing up on whats happening with PHP, tinkering etc

### Rolling Commentary

see root's readme, these are the PHP notes

* So Laravel has an installer these days but it & all the official "make a clean repo" [instructions](https://laravel.com/docs/12.x#creating-a-laravel-project) install locally. Given I'm going to be brushing up on multiple languages containerised is the way to go
    * apparently this setup [guide](php.new) is very trendy, but it's all local install, looking at [this](https://www.reddit.com/r/laravel/comments/1jd6fh5/laravel_12_sail_docs_removed/) it seems like Laravel are trying to funnel towards paid-products for it
    * Okay, gonna try following this [video](https://www.youtube.com/watch?v=1aDuaPhJT8E) which claims to give me a nice clean repo
        * that was an uphill fight and several trouble shooting sessions. I'll commit at this point as it's an effectively clean Laravel + DB (in docker) setup now, although the .env obviously needs porting/names changing etc
        * One initially messy aspect, but that's nice is sticking the Laravel 1 level down from most (docker file & laravel env) files changed
        * Slept on it, and the lack of live code updates kinda kills the encapsulation. Seems the guide maker's answer was to run it locally for dev...que cera
* Laracasts seem stale, at least step 0 and step 1 wise. Seems like Laravel's going through growing pains on how to set it up
* Gave up on the explicit approach above as a time sink, giving [Laravel Sail](https://laravel.com/docs/12.x/sail) a go, even if it's not being fully supported
    * Gives me the security ick that the preferred way of using this is curl'ing a remote bash script ( curl -s https://laravel.build/ticketsplease | bash )
    * Took longer to run than I'd expect, but then it's bundled a lot of opinionated stuff in. I've got Mellisearch, mailpit & selenium all in there for some reason
        * okay looks like you can exclude some cruff with arguments ( curl -s "https://laravel.build/ticketsplease?with=mysql,redis" | bash )
        * There maybe an --api parameter according to [this](https://x.com/taylorotwell/status/1483892844968427532) but that checklist seems easy enough to port over testing
        * Wow this feels like wack a mole : so [this](https://laracasts.com/index.php/discuss/channels/laravel/routesapiphp-removed-in-laravel-12-use-web-or-restore-it) tipped me off to people restoring "API" functionality in 12
    * feels a little annoying the session default is DB but the migration to create that table isn't done but as long as you switch to file its low friction
* I was intending to follow [this](https://laracasts.com/series/laravel-api-master-class/episodes/1) Laracast course, but looks like it pivots to paywall. Pivoting to [this](https://apiacademy.treblle.com/laravel-api-course/intro-and-setup) instead, seems to have gotten positive feedback online and matches my refresher goals.
* So immediately this new guide uses Breeze which isn't an option anymore, but [it doesn't look too hard to after the fact it back in](https://laraveldaily.com/post/how-to-install-laravel-breeze-laravel-12).
    * Looks like the preferred way is to use directly using [sanctum](https://laravel.com/docs/12.x/sanctum), but since this guide uses breeze to do this, that can be for another time
    * Summary of what I did to get to close to the guides baseline (lets you pick up around 7:30)

        * `curl -s "https://laravel.build/TreblleAPI?with=pgsql,redis" | bash` (create a fresh postgres project via sail)
        * (cd into repo and `./vendor/bin/sail up` then nav back in a fresh tab)
        * `./vendor/bin/sail composer require laravel/breeze --dev` (install breeze manually)
        *  `./vendor/bin/sail artisan breeze:install api` (Install Breeze's "API only" mode & say yes to run migrations)
        * open app/Models/User.php and add the `HasAPITokens` trait

* Tutor suggests dropping App/Http/Controllers/Controller but I'd rather keep it for loggers and helpers ( user fetching etc)
* It's good the tutor is showing failures, and therefore how to fix, but he's not really explaining the fixing process and it's leading to a lot of remove and recover
* There's gonna be a bit of drift between the tutor code, he's changing things like DB migration's lambdas which just isn't needed for something like this
    * Particularly of note, he seems to dislike phpdocs, but good habits still feel like keeping them to me
* Making models from CLI makes sense (e.g. `./vendor/bin/sail artisan make:model Service -mf` ) but my old all-by-hand muscle memory hurts doing it. Odd when I use touch and mkdir over IDE
* An interesting thing is the lean to Ulid. Probably from muscle memory since uuid v7 gives all the same advantages (temporal sorting mainly)
    * Relatedly casual use of ->string() for labels. It's totally valid with Postgres but you can tell the tutor doesn't think in mySQL or other DB-engines where that'd be a bad habit
* Not familiar with a todo() method, and neither is VSC but the tutor's IDE is. Must be a feature of PHPStorm I'm not aware of
    * PHPunit seems to be able to read these for the tutor but isn't working for me, I've always generated stub functions instead
* Okay tests are failing, looks like something funky happened to my db after the end of the previous session
    * running the artisan migrate:refresh & migrate:fresh both failed. Tracked issue to a sequencing issue. I'd created the checks before the credentials but checks depends on it. Would have been good for the tutor to make that clearer, that could really mess up inexperienced devs (but i just renamed the migration so the sequences worked out)
* 5th lesson is a lot of Laravel specific authentication options, would have been nice to have the tutor at least briefly touch on self defined auth (even if just the complexitities of it and suggesting it's not worth it)
    * Also we jump to making policies at one point without the tutor actually talking about what in this context the.
* Good reminder of using @property in docblocks to de-magic Eloquent but bad use of changed relationships without catches for data-integrity failures (clearly never caught out there, lucky guy)

## Side note

After messing around with ChatGPT, I asked it the following (after giving it my CV in markdown for context)

>  I want you to create 3 crash courses on programming ( language/Framework knowledge & experience, and practice). One for PHP, one for Whatever Javascript/Typescript framework is in the most job listings, and one for C#. The outcome should be knowledge of all applicable events for the language ( rise of popular tools, style of programming being popular etc ) and sufficient code I could upload to somewhere like github to show competence

> Expansion prompt : I don't want to do it with you now, I want courses with external learning resources I can follow. Each crash course should be complete-able within a 40hour window ( i.e. a work week )

This is what it gave me back, even though I'm not actually going to follow it.


🚀 CRASH COURSE 1: PHP – Modern Full-Stack PHP (with Laravel)

✅ Goal: Be fluent in modern PHP (8.2+), Composer ecosystem, and Laravel basics

📅 Time Commitment: ~40 hours

📂 GitHub Project: Build a “Mini SaaS” — e.g. task manager, invoicing tool, etc.

🧭 Week Plan

Day	Focus	Description
1	Language Fundamentals	PHP 8.x features, OOP, type system, modern syntax

2	Composer + Laravel Setup	Laravel install, config, routes, MVC basics

3	Database & Auth	Eloquent ORM, Migrations, Seeding, Auth scaffolding

4	API & Blade Views	REST API, Form handling, Blade templates

5	Deploy + GitHub Polish	Tinker with tests, fix issues, deploy to Fly.io or Railway

🧠 Resources

    PHP 8+ Fundamentals (3 hrs):
    https://phptherightway.com + https://www.learn-php.org

    Laravel From Scratch (Free - 6.5 hrs):
    Laracasts Series

    Database Bootcamp (SQL):
    https://sqlbolt.com

    Deploy Laravel Easily:
    Laravel on Railway

    GitHub Repo Inspiration:
    https://github.com/junaid33/laravel-crud