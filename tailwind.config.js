/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.blade.php", "./resources/**/*.js", "./resources/**/*.vue"],
  theme: {
    container: {
      center: true,
      padding: "16px"
    },
    extend: {
      colors: {
        primary: "#f97316",
        second: "#3b82f6",
        phar: "#64748b",
        dark: "#111827",
        pink: "#dd7d7e",
        pinktua: "#be185d"
      },
      screens: {
        sm: "480px",
        md: "768px",
        lg: "976px",
        xl: "1320px",
        "2xl": "1440px"
      },
      fontFamily: {
        lobster: ["Lobster"]
      }
    }
  }
};
