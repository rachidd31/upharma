import unittest
import datetime
from erp_system.purchase.services import create_purchase_order, get_purchase_order
from erp_system.purchase import services as purchase_services # To reset db and ID
from erp_system.inventory import services as inventory_services # To reset inventory db and ID
from erp_system.inventory.services import create_product as create_inventory_product


class TestPurchase(unittest.TestCase):

    def setUp(self):
        purchase_services.purchase_orders_db.clear()
        purchase_services.next_purchase_order_id = 1

        inventory_services.products_db.clear()
        inventory_services.next_product_id_int = 1

    def test_create_purchase_order(self):
        prod1 = create_inventory_product('Test Raw Material', 'DescRM', 5.00, 0.00, 0)

        items_data = [
            {'product_id': prod1.product_id, 'product_name': prod1.name, 'quantity': 10, 'unit_price': 5.00},
        ]
        order = create_purchase_order('Test Vendor', items_data)

        self.assertEqual(order.order_id, 'PO001')
        self.assertEqual(order.vendor_name, 'Test Vendor')
        self.assertEqual(len(order.items), 1)
        self.assertEqual(order.items[0].product.name, 'Test Raw Material')
        self.assertEqual(order.items[0].quantity, 10)
        self.assertEqual(order.items[0].subtotal, 50.00)

        retrieved_order = get_purchase_order('PO001')
        self.assertIsNotNone(retrieved_order)
        self.assertEqual(retrieved_order.vendor_name, 'Test Vendor')

    def test_get_non_existent_purchase_order(self):
        order = get_purchase_order('PO999')
        self.assertIsNone(order)

if __name__ == '__main__':
    unittest.main()
