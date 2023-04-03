
## Why? ##

I got sick of always having to write a basic static page controller, page editing functions, and template for every new project. So I made this bundle.

It's called Parchemin because it's a French word for "scroll", "paper". or "parchment". It's also a reference to the fact that this bundle is super basic and super primitive... just like parchment. 

If you want CMS functionality, you should use virtually anything else.  I've heard Sonato or Sylius are good. This is just a simple way to add static pages to your Symfony project.  Ideally like a privacy policy or terms of service page.

1. `composer require maric-trading/parchemin`
2. Then enable the bundle in the bundles file.  `\MaricTrading\Parchemin\MaricTradingParcheminBundle::class => ['all' => true],`
3. Do the database migrations `bin/console doctrine:migrations:migrate`
4. Configure the bundle in the config file `config/packages/maric_trading_parchemin.yaml`
5. Override the templates if you want to.  And you really should want to.  They're pretty ugly.  Over-ride by adding your own at `templates/bundles/MaricTradingParcheminBundle/page/show.html.twig`
6. Don't forget to add the routes to your `config/routes.yaml` file and set a prefix if you want to.

```
parchemin:
    resource: '@MaricTradingParcheminBundle/config/routes.yaml'
    prefix: /page
```

## Configuration ##

There are three configuration options at the moment.

```
maric_trading_parchemin:
  edit_role: ROLE_ADMIN
  additional_sitemap_routes: []
  allow_raw: true
```

| Key | Description | Default |
| --- | --- | -- |
| edit_role | The role required to edit the page. | ROLE_ADMIN |
| additional_sitemap_routes | An array of additional routes to add to the sitemap. | [] |
| allow_raw | Allow raw HTML in the page content. | true |

Yes allow_raw defaults to `true`.  You're a developer and I'm assuming you will want html in your static pages.  If that's not cool set `allow_raw` or override the `show.html.twig` and whitelist the tags you want.



