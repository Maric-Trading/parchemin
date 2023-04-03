
## Why? ##

I got sick of always having to write a basic static page controller and template for every new project. So I made this bundle.

It's called Parchemin because it's a French word for "scroll" or "paper". It's also a reference to the fact that this bundle is super basic and super primitive.  

If you want CMS functionality, you should use anything else. This is just a simple way to add static pages to your Symfony project.  Ideally like a privacy policy or terms of service page.

1. `composer require maric-trading/parchemin`
2. Then enable the bundle in the bundles file.  `\MaricTrading\Parchemin\MaricTradingParcheminBundle::class => ['all' => true],`
3. Do the database migrations `bin/console doctrine:migrations:migrate`
4. Configure the bundle in the config file `config/packages/maric_trading_parchemin.yaml`
5. Override the templates if you want to.  And you really should want to.  They're pretty ugly.  Over-ride by adding your own at `templates/bundles/MaricTradingParcheminBundle/page/show.html.twig`

## Configuration ##

There is only really one configuration option at the moment.

```
maric_trading_parchemin:
  edit_role: ROLE_ADMIN
```

| Key | Description | Default |
| --- | --- | -- |
| edit_role | The role required to edit the page. | ROLE_ADMIN |
| additional_sitemap_routes | An array of additional routes to add to the sitemap. | [] |
| allow_raw | Allow raw HTML in the page content. | true |


