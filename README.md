# Craft Untappd Plugin 🍺

Untappd v4 API endpoints as craft template variables.

## Installation
1. Move the `untappd` folder into your `craft/plugins` directory
2. Install the plugin on your Craft Control Panel
3. Enter your Client ID and Secret token from Untappd on the plugin's settings page

## Usage
Note: This plugin only supports small portions of the Untappd API. Pull requests and issues welcome.

### Breweries

#### craft.untappd.brewery.info ([docs](https://untappd.com/api/docs#breweryinfo))

Returns brewery object.

```
{% set brewery = craft.untappd.brewery.info({'id': 7115}) %}
{{brewery.brewery_name}}
```

#### craft.untappd.brewery.photos

Returns an array of checkins at the brewery with photos attached.

```
{% set checkins = craft.untappd.brewery.photos({'id': 7115}) %}
{% for checkin in checkins %}
  <img src="{{checkin.photo.photo_img_md}}" />
  <span>{{ checkin.user.first_name }} {{ checkin.user.last_name }}</span>
{% endfor %}
```

### Beers

#### craft.untappd.beer.info ([docs](https://untappd.com/api/docs#beerinfo))

Returns beer object.

```
{% set beer = craft.untappd.beer.info({'id': 240862}) %}
{{beer.beer_description}}
```

#### craft.untappd.beer.photos

Returns an array of checkins associated with the selected beer with photos attached.

```
{% set checkins = craft.untappd.beer.photos({'id': 240862}) %}
{% for checkin in checkins %}
  <img src="{{checkin.photo.photo_img_org}}" />
  <span>{{ checkin.user.first_name }} {{ checkin.user.last_name }}</span>
{% endfor %}
```