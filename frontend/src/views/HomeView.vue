<template>
  <div>
    <p>
      Welcome to the Acme Widgets Job Hazard Assessment App, where safety meets efficiency in
      producing the wackiest items for the Looney Tunes universe. At Acme, we understand the
      importance of ensuring a secure working environment for our employees while maintaining the
      whimsical spirit that defines our products. With our SPA Job Hazard Assessment, we provide a
      comprehensive platform for identifying, evaluating, and mitigating potential hazards across
      all stages of production. From slippery banana peels to explosive dynamite, our app empowers
      our team to proactively address risks, ensuring not only their safety but also the
      uninterrupted flow of creativity that makes Acme the go-to supplier for all things Looney
      Tunes.
    </p>
    <p>
      With the Acme Widgets Job Hazard Assessment App, safety is never a cartoonish
      afterthought—it's a priority woven into the fabric of our operations. Our user-friendly
      interface streamlines the hazard assessment process, allowing employees to easily identify
      potential risks and take proactive measures to address them. By fostering a culture of safety
      and accountability, we ensure that every member of our team can confidently contribute their
      talents to bringing the zaniest inventions to life. Join us in our commitment to safety
      excellence, where every day is an adventure in innovation without compromising on the
      well-being of our workforce.
    </p>
  </div>
  <form>
    <select v-model="valueA">
      <option>a</option>
      <option>b</option>
      <option>c</option>
      <option>D</option>
      <option>e</option>
    </select>
  </form>
  <!-- <main>
    <TheWelcome />
  </main> -->
</template>
<script>
import { defineComponent } from 'vue'
export default defineComponent({
  data() {
    return {
      valueA: 'b'
    }
  }
})
</script>
