# Run Morcado for Development

In order to run the morcado project locally, you will need to ensure you are running a local instance of the [dev-tools](https://github.com/TrueNorthMortgage/dev-tools) proxy.

1. Ensure [dev-tools](https://github.com/TrueNorthMortgage/dev-tools) is running
2. Run with `./start` or `./restart`. App will be available at <https://morcado.tnmdev.com/>.
3. Stop with `./stop`
4. Run `npm run watch` inside the container `morcado-dev-php `

Images can also be built and re-built using the `./build` script. See `./build -h` for options.