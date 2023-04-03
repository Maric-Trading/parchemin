
## Why? ##

I got sick of always having to write a basic static page controller and template for every new project. So I made this bundle.

It's called Parchemin because it's a French word for "scroll" or "paper". It's also a reference to the fact that this bundle is super basic and super primitive.  

If you want CMS functionality, you should use anything else. This is just a simple way to add static pages to your Symfony project.  Ideally like a privacy policy or terms of service page.


2. composer require maric-trading/parchemin

2. Then enable the bundle in the bundles file.

`\MaricTrading\Parchemin\MaricTradingParcheminBundle::class => ['all' => true],`

3. Do the database migrations
4. Configure the bundle in the config file `config/packages/maric_trading_parchemin.yaml`



