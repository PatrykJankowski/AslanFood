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
      'primary': '#E7B222',
      'secondary': '#E7B222',
      'text-color': '#2C2F24',
      yellow: {
          100: 'oklch(0.973 0.071 103.193)',
          300: 'oklch(0.905 0.182 98.111)',
          800: 'oklch(0.476 0.114 61.907)',
          DEFAULT: '#E7B222'
        },
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