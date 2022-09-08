<div
    wire:ignore
    x-data="{
        vendDateArr: @entangle('vendDateArr'),
        vendTempsArr: @entangle('vendTempsArr'),
        init() {
            const labels = this.vendDateArr;

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Temp',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: this.vendTempsArr,
                    tension: 0.1,
                    pointRadius: 2,
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                }
            };

            const myChart = new Chart(
                this.$refs.canvas,
                config
            );

            Livewire.on('updateChart', () => {
                myChart.data.datasets[0].data = this.vendTempsArr;
                myChart.data.labels = this.vendDateArr;
                myChart.update();
            })
        }
    }"
>
    <div class="bg-white h-screen rounded-md border my-8 md:px-6 py-6 md:mx-5">
        <div>
            <div>
                <x-button class="mx-5 bg-gray-300 hover:bg-gray-400 active:bg-gray-500 text-black flex space-x-1 px-3" wire:click="returnPrevPage()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M8.445 14.832A1 1 0 0010 14v-2.798l5.445 3.63A1 1 0 0017 14V6a1 1 0 00-1.555-.832L10 8.798V6a1 1 0 00-1.555-.832l-6 4a1 1 0 000 1.664l6 4z" />
                    </svg>
                    <div>
                        Back
                    </div>
                </x-button>
            </div>
            <h2 class="px-5 pt-5 text-xl font-semibold">
                Machine code:
                <span class="text-2xl font-semibold">
                    {{ $vend->code }}
                </span>
                Temperature
            </h2>
            <div
                x-data="{
                    dayCountOptions: @entangle('dayCountOptions'),
                    selectedDayCountOption: @entangle('selectedDayCountOption'),
                }"
                class="my-6 mx-3 flex space-x-2"
            >
                <template x-for="dayCountOption in dayCountOptions" :key="dayCountOption">
                    <button
                        @click="$wire.onDayCountOptionClicked(dayCountOption)"
                        class="inline-flex items-center px-4 py-2 bg-red-300 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest active:bg-red-500 focus:outline-none focus:border-red-700 disabled:opacity-25 transition ease-in-out duration-150 hover:bg-red-300 focus:bg-red-400 focus:ring focus:ring-red-300 text-black space-x-1"
                        :class="dayCountOption == selectedDayCountOption ? 'bg-red-400 ' : 'bg-red-200'"
                    >
                        <span x-text="dayCountOption"></span>
                        <span>
                            Day<span x-show="dayCountOption > 1">s</span>
                        </span>
                    </button>
                </template>
            </div>
            <div
                x-data="{
                    startDate: @entangle('startDate'),
                    endDate: @entangle('endDate'),
                }"
                class="mt-2 mx-5 flex space-x-2"
            >
                <h6 x-text="startDate"></h6>
                <span>to</span>
                <h6 x-text="endDate"></h6>
            </div>
            <h6 class="mx-5 text-sm">
                Last updated {{\Carbon\Carbon::parse($vend->temp_updated_at)->toDateTimeString()}}
            </h6>
            <div class="overflow-scroll">
                <canvas class="h-fit w-full" if="myChart" x-ref="canvas" ></canvas>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    @endpush
</div>
