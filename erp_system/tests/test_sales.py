import unittest
import datetime
from erp_system.sales.services import create_sale_order, get_sale_order
from erp_system.sales import services as sales_services # To reset sales_orders_db
from erp_system.inventory import services as inventory_services # To reset products_db and IDs
from erp_system.inventory.services import create_product as create_inventory_product

class TestSales(unittest.TestCase):

    def setUp(self):
        # Resetting the in-memory dbs for relevant services
        sales_services.sales_orders_db.clear()
        sales_services.next_sale_order_id = 1

        inventory_services.products_db.clear() # Reset products if sales tests create them
        inventory_services.next_product_id_int = 1


    def test_create_sale_order(self):
        prod1 = create_inventory_product('Test Product 1', 'Desc1', 10.00, 20.00, 100)

        items_data = [
            {'product_id': prod1.product_id, 'product_name': prod1.name, 'quantity': 2, 'unit_price': 20.00},
        ]
        order = create_sale_order('Test Customer', items_data)

        self.assertEqual(order.order_id, 'SO001')
        self.assertEqual(order.customer_name, 'Test Customer')
        self.assertEqual(len(order.items), 1)
        self.assertEqual(order.items[0].product.name, 'Test Product 1')
        self.assertEqual(order.items[0].quantity, 2)
        self.assertEqual(order.items[0].subtotal, 40.00)

        retrieved_order = get_sale_order('SO001')
        self.assertIsNotNone(retrieved_order)
        self.assertEqual(retrieved_order.customer_name, 'Test Customer')

    def test_get_non_existent_sale_order(self):
        order = get_sale_order('SO999')
        self.assertIsNone(order)

if __name__ == '__main__':
    unittest.main()
