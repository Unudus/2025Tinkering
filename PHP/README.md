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
    * feels a little annoying the session default is DB but the migration to create that table isn't done but as long as you switch to file its low friction

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