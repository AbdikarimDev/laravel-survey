<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import { Head, useForm } from '@inertiajs/vue3'; 

const form = useForm({
    name: '',
    price: '',
    description: '',
});
const handleSubmit = () => {
    form.post('/products');
    console.log('this is the information thats in the forms',form)
}
 
defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Create Prouduct',
                href: '/products/create',
            },
        ],
    },
});
</script>

<template>
    <Head title="Create Product" />

    <div class="p-4">
        <form @submit.prevent="handleSubmit" class="flex flex-col gap-4">
            <div class="space-y-2">
                <Label for="product name">Name</Label>
                <Input
                    v-model="form.name"
                    type="text"
                    placeholder="Enter Product Name"
                />
                <div class="text-sm text-red-600" v-if="form.errors.name">
                    {{ form.errors.name }}
                </div>
            </div>
            <div class="space-y-2">
                <Label for="product Price">Price</Label>
                <Input
                    v-model="form.price"
                    type="text"
                    placeholder="Enter Product Price"
                />
                <div class="text-sm text-red-600" v-if="form.errors.price">
                    {{ form.errors.price }}
                </div>
            </div>
            <div class="space-y-2">
                <Label for="product Description">Description</Label>
                <Input
                    v-model="form.description"
                    type="text"
                    placeholder="Enter Product Description"
                />
                <div class="text-sm text-red-600" v-if="form.errors.description">
                    {{ form.errors.description }}
                </div>
            </div>
            <Button
            :disabled="form.processing"
                class="flex lg:w-[10%] items-center justify-center"
                type="submit"
                >Submit</Button
            >
        </form>
    </div>
</template>
