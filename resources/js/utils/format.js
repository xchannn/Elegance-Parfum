export function currency(value) {
  if (typeof value !== 'number') {
    value = parseFloat(value);
  }
  return value.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
} 