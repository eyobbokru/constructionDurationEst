<template>
  <AdminLayout title="Dashboard">
    <main class="max-w-6xl mx-auto mt-6 min-h-screen">
      <section
        class=" dark:bg-gray-900 dark:text-white mt-4 p-2 rounded"
      >
        <div
          class="
            m-2
            p-2
            text-2xl
            font-bold
            text-indigo-600
            dark:text-indigo-300
          "
        >

          <h1>Projects</h1>
        </div>

 <div
          class="
            grid grid-cols-2
            sm:grid-cols-1
            md:grid-cols-2
            lg:grid-cols-3
            gap-2
            rounded
          "
        >
          <projectCard v-for="project in projects.data" :key="project.id">
            <template #image>
             <Link  :href="route('user.project.show', project.id)">
                <div class="aspect-w-2 aspect-h-3">
                  <img
                    class="object-cover
                    w-4xl
                    h-2xl
                    "
                    src="/img/con2.jpg"
                  />
                </div>
            
              
                <div
                  class="
                    absolute
                    inset-y-0
                    left-5
                    z-10
                   
                    group-hover:visible
                    flex
                    items-center
                  "
                >
                 
                </div>
                <div
                  class="
                    absolute
                    flex flex-wrap
                    z-10
                    bottom-2
                    left-2
                    text-indigo-300 text-sm
                    font-bold
                    group-hover:text-blue-700
                  "
                >
               
                </div>
              </Link>
            </template>
            <Link  :href="route('user.project.show', project.id)">
              <div class="dark:text-white font-bold group-hover:text-blue-400">

                {{ project.name }}
                <p>
                {{ project.detail }}</p>
              </div>
            </Link>
          </projectCard>
        </div>

</section>
</main>
    
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";
import projectCard from "@/Components/projectCard.vue";
import { ref, watch, defineProps } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    projects: Object,
   filters: Object,
});

</script>

<style>
</style>
