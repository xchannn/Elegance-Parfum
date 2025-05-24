export function currency(value) {
  if (typeof value !== 'number') {
    value = parseFloat(value);
  }
  return value.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
} 