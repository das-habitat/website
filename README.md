# Website for Das Habitat Augsburg e.V.

Static website based on Hugo, using Webpack for asset compilation

## Requirements

-   [Hugo][hugo]
-   [Node.js][node]
-   [Yarn][yarn]

On macOS it's recommened to install all of the above using [Homebrew][brew].

## Development

Install dependencies by running `yarn`.

Use `yarn start` to run a development server which reloads when you make changes.

## Deployment

We use [Now][now] from Zeit to deploy the website.

-   `now -S habitat` to deploy a test build
-   `now -S habitat --target production` to deploy the website

Ask @pichfl for access.

## File structure

The project follows the basic file structure found in Hugo projects. The only exception is the `src` folder which is base for scripts and styles managed by Webpack.

[hugo]: https://gohugo.io
[node]: https://nodejs.org
[yarn]: http://yarnpkg.com
[bree]: https://brew.sh
[now]: https://zeit.co/now
