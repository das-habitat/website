# Website for Das Habitat Augsburg e.V.

Static website based on Hugo, using Webpack for asset compilation

## Requirements

- [Hugo][hugo]
- [Node.js][node]
- [Yarn][yarn]

On macOS it is recommened to install all of the above using [Homebrew][brew].

On Windows, it is recommend installing Node.js and Yarn via their respective
installers.

## Development

Install hugo on your machine and install dependencies by running `yarn install`.

If you don't have a global installation of Hugo, you can also download it
locally and use that version.

On macOS and Linux, you can use the same script that is used for deployments
`download-hugo.sh`, on Windows you will have to create a `.hugo` folder
yourself and put a fresh copy of `hugo.exe` there yourself, as @pichfl has no
clue about creating .bat files for automation there.

```bash
# Run this first on *nix/macOS
sh download-hugo.sh
```

### Run dev server

Use `yarn start` to run a development server which reloads when you make
changes.

## Deployment

We use [Now][now] from Zeit to deploy the website. Ask @pichfl for access.

## File structure

The project follows the basic file structure found in Hugo projects.

The theme folder "habitat" makes the only exception with a custom `assets` folder that gets compiled by Webpack.

[hugo]: https://gohugo.io
[node]: https://nodejs.org
[yarn]: https://yarnpkg.com
[brew]: https://brew.sh
[now]: https://zeit.co/now
