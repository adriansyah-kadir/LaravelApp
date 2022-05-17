module.exports = {
  mode: "jit",
  content: ["./resources/views/**/*.{html,php}"],
  theme: {
    extend: {
      height: {
        vh: "100vh",
      },
      boxShadow: {
        border: "0 0 0 2px",
        ef: "2px 2px 1px  red",
      },
      borderRadius: {
        inherit: "inherit",
      },
      backgroundSize: {
        cover: "cover",
        110: "100%",
        120: "120%",
      },
    },
  },
  plugins: [
    function ({ addVariant }) {
      addVariant("child", "& > *");
    },
  ],
};
