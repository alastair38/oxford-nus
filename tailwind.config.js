const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './*/*.php',
    './**/*.php',
    './js/*.js',
    './functions.php',
    '../../plugins/blockhaus-functionality-base/includes/blocks/**/*.php',
  ],
  safelist: [
    'rounded-blob',
    'object-right',
    'object-left',
    'object-center',
    'aspect-video',
    'aspect-hero',
    'gap-x-12',
    'gap-y-6',
    'p-0',
    'lg:p-12',
    'ring-offset-primary',
    'grid-cols-fit',
    'grid-cols-fill',
    'grid-cols-2',
    'grid-cols-3',
    'grid-cols-4',
    'col-start-3',
    'shadow-md',
    'shadow-xl',
    'sticky',
    'w-3/4',
    'w-1/2',
    'inset-0',
    'h-8',
    'mt-auto',
    'relative',
  ],
  theme: {
    screens: {
      sm: '640px',
      // => @media (min-width: 640px) { ... }

      md: '768px',
      // => @media (min-width: 768px) { ... }

      lg: '1024px',
      // => @media (min-width: 1024px) { ... }

      xl: '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1700px',
      // => @media (min-width: 1536px) { ... }
    },
    fontFamily: {
      sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
      serif: ['Merriweather', ...defaultTheme.fontFamily.serif],
      mono: [...defaultTheme.fontFamily.mono],
    },
    fontSize: {
      sm: 'var(--wp--preset--font-size--small)',
      tiny: 'var(--wp--preset--font-size--tiny)',
      default: 'var(--wp--preset--font-size--normal)',
      lg: 'var(--wp--preset--font-size--large)',
      xl: 'var(--wp--preset--font-size--extra-large)',
      huge: 'var(--wp--preset--font-size--huge)',
      gigantic: 'var(--wp--preset--font-size--gigantic)',
      display: 'var(--wp--preset--font-size--display)',
    },
    backgroundPosition: {
      bottom: 'bottom',
      'bottom-4': 'center bottom 1rem',
      center: 'center',
      left: 'left',
      'left-bottom': 'left bottom',
      'left-top': 'left top',
      right: 'right',
      'right-bottom': 'right bottom',
      'right-top': 'right top',
      top: 'top',
      'top-4': 'center top 1rem',
      'polka-pos': '0px 0px, 8px 8px',
    },
    backgroundSize: {
      auto: 'auto',
      cover: 'cover',
      contain: 'contain',
      'polka-size': '16px 16px',
      'check-size': '8px 8px',
    },
    extend: {
      colors: {
        base: 'var(--wp--preset--color--base)',
        contrast: 'var(--wp--preset--color--contrast)',
        primary: 'var(--wp--preset--color--primary)',
        secondary: 'var(--wp--preset--color--secondary)',
        neutral: {
          light: {
            100: 'var(--wp--preset--color--neutral-light-100)',
            500: 'var(--wp--preset--color--neutral-light-500)',
            900: 'var(--wp--preset--color--neutral-light-900)',
          },
          dark: {
            100: 'var(--wp--preset--color--neutral-dark-100)',
            500: 'var(--wp--preset--color--neutral-dark-500)',
            900: 'var(--wp--preset--color--neutral-dark-900)',
          },
        },
      },
      backgroundImage: {
        gradient: 'var(--wp--preset--gradient--gray-to-cyan)',
        polka:
          'radial-gradient(rgba(0, 0, 0, .125) 10%, transparent 10%),radial-gradient(rgba(0, 0, 0, .125) 10%, transparent 10%)',
        checked:
          'linear-gradient(rgb(0 0 0 / 3%) 1px, transparent 1px), linear-gradient(to right, rgb(0 0 0 / 3%) 1px, transparent 1px)',
        horizontal:
          'repeating-linear-gradient(45deg, rgb(0 0 0 / 3%) 0, rgb(0 0 0 / 3%) 0.8px, transparent 0, transparent 50%)',
      },
      aspectRatio: {
        hero: '16 / 11',
      },
      borderRadius: {
        blob: '61% 39% 36% 64% / 47% 50% 50% 53%',
      },
      boxShadow: {
        retro: '2px 2px 0 0 currentColor',
      },
      gridTemplateColumns: {
        // Complex site-specific column configuration
        fit: 'repeat(auto-fit, minmax(320px, 1fr))',
        fill: 'repeat(auto-fill, minmax(250px, 75ch))',
        prose: 'minmax(300px, 75ch) 1fr',
      },
      typography: {
        DEFAULT: {
          css: {
            color: 'var(--wp--preset--color--contrast)',
            a: {
              color: 'var(--wp--preset--color--primary)',
              textDecorationThickness: '2px',
              fontWeight: '900',
              '&:hover': {
                color: 'var(--wp--preset--color--contrast)',
              },
            },
          },
        },
      },
    },
  },
  plugins: [
    // require('@tailwindcss/typography'),
    require('@tailwindcss/forms')({
      strategy: 'base', // only generate global styles
    }),
  ],
};
