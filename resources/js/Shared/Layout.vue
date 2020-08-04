<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <inertia-link
            class="navbar-brand"
            :href="$route('dashboard')"
            v-text="$page.static_data.app_name"
        />

        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon" />
        </button>

        <div
            id="navbarSupportedContent"
            class="collapse navbar-collapse"
        >
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a
                  v-pre
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
              >
                Menu <span class="caret" />
              </a>

              <div
                  class="dropdown-menu dropdown-menu-right"
                  aria-labelledby="navbarDropdown"
              >
                <inertia-link
                    href="#"
                    class="dropdown-item"
                >
                  Menu Item
                </inertia-link>
                <inertia-link
                    href="#"
                    class="dropdown-item"
                >
                  Menu Item
                </inertia-link>
                <inertia-link
                    href="#"
                    class="dropdown-item"
                >
                  Menu Item
                </inertia-link>
              </div>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a
                  id="navbarDropdown"
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
              >
                {{ $page.auth.user.name }} <span class="caret" />
              </a>

              <div
                  class="dropdown-menu dropdown-menu-right"
                  aria-labelledby="navbarDropdown"
              >
                <a
                    class="dropdown-item"
                    href="#"
                    @click="handleLogout"
                >Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      <!--            <FlashMessage @hide-flash-message="hideFlashMessage"-->
      <!--                          v-if="shouldShowFlashMessage"/>-->
      <slot />
    </main>
  </div>
</template>

<script>
import FlashMessage from "../components/Utilities/FlashMessage";

export default {
  components: {
    FlashMessage
  },
  data() {
    return {
      shouldShowFlashMessage: true
    }
  },
  watch: {
    "$page.flash": {
      handler() {
        this.shouldShowFlashMessage = true
      },
      deep: true,
    },
  },
  methods: {
    async handleLogout() {
      await axios.post("/logout");

      window.location.href = "/";
    },
    hideFlashMessage() {
      this.shouldShowFlashMessage = false;
    }
  }
}
</script>

<style scoped>

</style>
