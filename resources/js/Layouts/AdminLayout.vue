<template>
  <div>
    <Head :title="title" />

    <div class="flex h-screen bg-gray-200 font-roboto">

    
    <Sidebar  v-if="$page.props.is_admin" />
     <Sidebar_User v-else />

      <div class="flex-1 flex flex-col overflow-hidden">
        <header
          class="
            flex
            justify-between
            items-center
            py-4
            px-6
            bg-white
            border-b-4 border-indigo-600
          "
        >
          <div class="flex items-center">
            <button
              @click="sidebarOpen = true"
              class="text-gray-500 focus:outline-none lg:hidden"
            >
              <svg
                class="h-6 w-6"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M4 6H20M4 12H20M4 18H11"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>

            <div class="relative mx-4 lg:mx-0">
              <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg
                  class="h-5 w-5 text-gray-500"
                  viewBox="0 0 24 24"
                  fill="none"
                >
                  <path
                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </span>

              <input
                class="
                  form-input
                  w-32
                  sm:w-64
                  rounded-md
                  pl-10
                  pr-4
                  focus:border-indigo-600
                "
                type="text"
                placeholder="Search"
              />
            </div>
          </div>

          <div class="flex items-center">
             
                    <div class="relative">
                    <button
                        @click="dropdownOpen = !dropdownOpen"
                        class="
                        relative
                        block
                        h-8
                        w-8
                        rounded-full
                        overflow-hidden
                        shadow
                        focus:outline-none
                        "
                    >
                        <img
                        class="h-full w-full object-cover"
                        src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=296&q=80"
                        alt="Your avatar"
                        />
                    </button>

                    <div
                        v-show="dropdownOpen"
                        @click="dropdownOpen = false"
                        class="fixed inset-0 h-full w-full z-10"
                    ></div>

                    <div
                        v-show="dropdownOpen"
                        class="
                        absolute
                        right-0
                        mt-2
                        w-48
                        bg-white
                        rounded-md
                        overflow-hidden
                        shadow-xl
                        z-10
                        "
                    >
                        <a
                     :href="route('profile.show')"
                        class="
                            block
                            px-4
                            py-2
                            text-sm text-gray-700
                            hover:bg-indigo-600 hover:text-white
                        "
                        >Profile</a
                        >
                            <form @submit.prevent="logout">
                        <button
                        href=""
                        class="
                            block
                            px-4
                            py-2
                            text-sm text-gray-700
                            hover:bg-indigo-600 hover:text-white
                        "
                        >
                     
                         
                                 Log Out
                                    
                     
                        </button
                        >
                         </form>
                    </div>
                    </div>
          </div>
        </header>
        <!-- Page Heading -->
        <header class="bg-white shadow" v-if="$slots.header">
          <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              <slot name="header"></slot>
            </h2>
          </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <jet-banner />
          <slot></slot>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import JetBanner from "@/Jetstream/Banner.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
import JetNavLink from "@/Jetstream/NavLink.vue";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Sidebar from "../Components/Sidebar.vue";
import Sidebar_User from "../Components/Sidebar_User.vue";

export default defineComponent({
  props: {
    title: String,
  },

  components: {
    Head,
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    Link,
    Sidebar,
    Sidebar_User
},

  data() {
    return {
      showingNavigationDropdown: false,
      dropdownOpen: false,
      notificationOpen: false,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      this.$inertia.post(route("logout"));
    },
  },
});
</script>
