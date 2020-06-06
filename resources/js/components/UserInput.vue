<template>
   <div class="outer-container max-w-sm sm:max-w-md mx-auto p-3 mt-4 border rounded shadow-md">
      <div
        class="blue-bg text-xl text-left text-white max-w-sm sm:max-w-md mx-auto px-6 py-3 border rounded shadow-md"
      >Enter Your Current Weight</div>
      <div class="flex">
        <input
          class="bg-white text-xl text-center text-black mx-auto mt-4 p-3 border rounded shadow-md w-9/12 mr-2"
          placeholder="Enter Weight"
        />
        <select
          class="bg-white text-xl text-black mx-auto p-3 mt-4 border rounded shadow-md w-3/12"
          placeholder="kg"
        >
          <option value="kg">kg</option>
          <option value="lb">lb</option>
        </select>
      </div>
      <div
        class="blue-bg text-xl text-white text-left max-w-sm sm:max-w-md mx-auto px-6 py-3 mt-6 border rounded shadow-md"
      >Enter A Date</div>
      <div class="flex flex-col">
        <input
          type="date"
          class="bg-white text-xl text-center text-black p-3 mx-auto mt-4 border rounded shadow-md w-full"
        />
      </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>