module.exports = {
  content: ["./**/*.php"],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#fff',
      'gray-1': '#B7B7B7',
      'gray-2': '#474747',
      'gray-3': "#F9F9F7",
      'gray-4': "",
      'gray-5': "#ADB29E",
      'black': '#2C2F24',
      'red': '#AD343E',
      'yellow': '#E7B222',
      'primary': '#AD343E',
      'secondary': '#E7B222',
      'text-color': '#2C2F24'
    },
    container: {
      screens: {
        DEFAULT: "1280px",
      },
    },
    screens: {
      'sm': '576px',
      'md': '768px',
      'lg': '992px',
      'xl': '1200px',
      '2xl': '1480px',
    },
    fontFamily: {
      'PlayfairDisplay': ['DM Sans'],
      'DMSans': ['DM Sans'],
    },
    extend: {
      /*gap: {
        '30': '1.875rem',
      }*/
      /*fontFamily: {
        'sans': ['Source Sans Pro', ...defaultTheme.fontFamily.sans],
      },*/
    },
  },
  plugins: [],
}