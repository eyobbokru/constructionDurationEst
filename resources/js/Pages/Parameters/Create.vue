<template>
    <AdminLayout title="create parameter">

           <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Parameter </h2>
            </template>

            <div class="py-2">
                <div class="max-w-7xl mx-auto">
                      <section class="container mx-auto p-6 font-mono">
                            <div class="w-full flex mb-4 p-2">
                                <Link
                                     :href="route('admin.parameter.index')"
                                      class="
                                                bg-green-500
                                                hover:bg-green-700
                                                text-white
                                                px-4
                                                py-2
                                                rounded-lg
                                            "
                                            >
                                            Back
                                  </Link>
                            </div>

                             <div
                                class="
                                w-full
                                mb-8
                                sm:max-w-md
                                p-6
                                overflow-hidden
                                bg-white
                                rounded-lg
                                shadow-lg
                                "
                            >

                                <form @submit.prevent="storeParam">
                                    <div>
                                           <jet-label for="Parameter" value="Parameter Categories" />
                                                <select
                                                id="select"

                                                class="mt-1 block w-full"
                                                v-model="form.sub_categories_id"
                                                autofocus required>

                                                <option   v-for="parameter in parameters" :key="parameter.id" :value="parameter.id"> {{parameter.name}}</option>
                                                </select>

                                                <div class="text-sm text-red-400" v-if="form.errors.sub_categories_id">
                                                {{ form.errors.sub_categories_id }}
                                                </div>

                                            <jet-label for="title" value="Title" />
                                                <jet-input
                                                id="title"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.name"
                                                autofocus
                                                autocomplete="title"
                                                required
                                                />
                                                <div class="text-sm text-red-400" v-if="form.errors.name">
                                                {{ form.errors.name }}
                                                </div>

                                             <jet-label for="datetype" value="DataType" />
                                               <select
                                                id="datetype"

                                                class="mt-1 block w-full"
                                                v-model="form.dataType"
                                                autofocus
                                                required>
                                                <option v-for="dataTypes in data_Type" :key="dataTypes.id" >{{dataTypes.name}} </option>

                                                </select>

                                                <div class="text-sm text-red-400" v-if="form.errors.dataType">
                                                {{ form.errors.dataType }}
                                                </div>


                                             <jet-label for="value" value="Value"  v-if="form.dataType=='Unit'"/>
                                                <jet-input
                                                id="value"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.value"
                                                autofocus
                                                autocomplete="title"
                                               v-if="form.dataType=='Unit'"
                                               required
                                               />
                                                <div class="text-sm text-red-400" v-if="form.errors.value">
                                                {{ form.errors.value }}
                                                </div>



                                             <jet-label for="unit" value="Unit"  v-if="form.dataType=='Unit'"/>
                                                <jet-input
                                                id="unit"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.unit"
                                                autofocus
                                                autocomplete="title"
                                               v-if="form.dataType=='Unit'"
                                               required
                                               />
                                                <div class="text-sm text-red-400" v-if="form.errors.unit">
                                                {{ form.errors.unit }}
                                                </div>

                                            <div v-if="form.dataType=='Category'">
                                                <div  v-for="(input,index) in form.option" :key="`option-${index}`">
                                                    <jet-label for="unit" value="Option"  />
                                                        <jet-input

                                                        type="text"
                                                        class="mt-1 inline w-1/2"
                                                       v-model="input.option_name"
                                                        :id="index"
                                                        autofocus

                                                        required

                                                    />
                                                        <div class="text-sm text-red-400" v-if="form.errors.unit">
                                                        {{ form.errors.unit }}
                                                        </div>

                                                          <jet-input
                                                        type="text"
                                                        class="mt-1 ml-1 inline w-1/4"
                                                        v-model="input.value"
                                                        :id="index"
                                                        autofocus
                                                        placeholder="weight"
                                                        required

                                                    />

                                                    <div class="inline">
                                                        <JetButton type="button"  :id="index" class="mt-1 ml-2 " @click="addField()">+</JetButton>
                                                        <JetButton type="button"  :id="index" class="mt-1 ml-1 " @click="RemoveField(index)">-</JetButton>
                                                    </div>



                                                </div>
                                            </div>

                                            <div class="flex items-center  mt-4">
                                                    <jet-button
                                                    class="ml-4"
                                                    :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing"
                                                    >
                                                    ADD
                                                    </jet-button>
                                                </div>
                                           </div>

                                </form>
                             </div>


                      </section>
                </div>

            </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, watch } from "vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";

const props = defineProps({
  parameters: Object,
  data_Type:Object


});


const form = useForm({

  sub_categories_id:"",
  name: "",
  dataType:"",
  value:"",
  unit:"",
  option:[
    {
    option_name: "",
    value:"",
  },
  ],

});

// let option = useForm({
//   name:"",
//   value: "",
// });

function addField(){

form.option.push({
     option_name: "",
    value:"",
});

}
function RemoveField(index){

    form.option.splice(index,1);


}

function storeParam() {
  form.post("/admin/paramfield");
}


</script>
