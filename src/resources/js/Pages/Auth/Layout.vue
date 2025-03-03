<template>
	<div class="m-auto p-6 shadow-md w-1/3">
		<div class="mt-2"><slot name="header"></slot></div>

		<slot></slot>

     	<hr class="w-full mt-4 border-1" />

		<div class="w-full mt-4 text-center"><slot name="footer"></slot></div>
	</div>
</template>