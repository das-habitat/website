# Website for Das Habitat Augsburg e.V.

Static website based on Hugo, using Webpack for asset compilation

## Requirements

- [Hugo][hugo]
- [Node.js][node]

On macOS it's recommened to install all of the above using [Homebrew][brew].

## Development

Install hugo on your machine and install dependencies by running `npm install`.

Use `npm start` to run a development server which reloads when you make changes.

### Alternative

If you don't have a global installation of Hugo, you can also download it locally and use that version.

```bash
sh download-hugo.sh

# Use `dev` instead of `start` to use the Hugo version downloaded by the script above
npm start dev
```

## Deployment

We use [Now][now] from Zeit to deploy the website. Ask @pichfl for access.

## File structure

The project follows the basic file structure found in Hugo projects.

The theme folder "habitat" makes the only exception with a custom `assets` folder that gets compiled by Webpack.

[hugo]: https://gohugo.io
[node]: https://nodejs.org
[brew]: https://brew.sh
[now]: https://zeit.co/now
