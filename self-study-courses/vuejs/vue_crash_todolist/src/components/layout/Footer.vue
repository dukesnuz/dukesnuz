
<template>
  <footer class="footer">
    <ul>
      <li>
        An AWESOME tutorial for Vue.js called
        <a
          href="https://www.youtube.com/watch?v=Wy9q22isx3U"
          target="blank"
        >Vue JS Crash Course - 2019</a>
      </li>
      <li>
        Instructor:
        <a href="http://www.traversymedia.com" target="blank">Traversy Media</a>
      </li>
      <li>
        Student:
        <a href="http://www.dukesnuz.com" target="blank">David Petringa</a>
      </li>
      <li>I completed this tutorial - January 2019</li>
    </ul>
  </footer>
</template>

<script>
export default {
  name: "Footer"
};
</script>

<style scoped>
.footer {
  margin-top: 250px;
  background: #ccc;
  color: #333;
  padding: 10px 0 250px 25px;
}

p {
  margin-left: 10px;
}

a {
  text-decoration: none;
}

ul {
  list-style-type: none;
}
</style>
 