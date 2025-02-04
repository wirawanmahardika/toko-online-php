/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    // "./resources/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        jost: '"Jost", sans-serif'
      }
    },
  },
  plugins: [require("@tailwindcss/forms")],
}