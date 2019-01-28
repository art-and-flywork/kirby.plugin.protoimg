# kirby-protoimg
Prototyping svg image with dynamic width &amp; height

## Installation
Manually:
````
Place the protoimg folder in `site/plugins`
````

## Usage
The plugin creates a route that can be used as img src:

````
<img src="/assets/protoimg.svg" alt="prototype image">
````

Width and height are adjustable with the get params `w` and `h`:

````
<img src="/assets/protoimg.svg?w=500&h=400" alt="prototype image">
````

## Note
The protoimg is only available if referrer hostname is the same as current hostname to prevent usage from the rest of the internet.

## Todo
- place security in config
- make route location customisable with config variable
