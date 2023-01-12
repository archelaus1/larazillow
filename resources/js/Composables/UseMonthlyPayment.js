import {computed, isRef} from 'vue'

export const useMonthlyPayment = (total, interestRate, duration) => {
    const monthlyPayment = computed(() => {
        const principal = isRef(total) ? total.value : total
        const monthlyInterest = (isRef(interestRate) ? interestRate.value : interestRate) / 100 / 12
        const numberOfPaymentMonths = (isRef(duration) ? duration.value : duration) * 12
    
        return principal * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) -1)
    })

    const totalPaid = computed(()=> {
    return (isRef(duration) ? duration.value : duration) * 12 * monthlyPayment.value
    })

    const totalInterest = computed(()=> totalPaid.value - (isRef(total) ? total.value : total))

    return {monthlyPayment, totalPaid, totalInterest}
}