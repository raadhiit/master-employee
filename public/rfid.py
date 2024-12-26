import serial
import asyncio
import aiohttp
import logging

API_CONFIG = {
    'base_url': "http://localhost:8000/api/store-rfid",  # Ganti dengan URL endpoint API Laravel Anda
    'timeout': 10,
}

SERIAL_CONFIG = {
    'port': 'COM12',  # Sesuaikan dengan port Arduino Anda
    'baud_rate': 9600,
    'timeout': 1,
}

# Fungsi untuk mengirim UID RFID ke API Laravel
async def send_uid_to_api(uid):
    """Kirim UID RFID ke API Laravel"""
    try:
        payload = {
            'rfid_id': uid
        }
        logging.info(f"Kirim data ke API: {payload}")

        async with aiohttp.ClientSession() as session:
            async with session.post(
                API_CONFIG['base_url'],
                json=payload,
                timeout=aiohttp.ClientTimeout(total=API_CONFIG['timeout'])
            ) as response:
                # Cek status code dan respons dari API
                if response.status in [200, 201]:
                    data = await response.json()
                    logging.info(f"Data berhasil dikirim: {data}")
                else:
                    logging.error(f"Gagal mengirim data: {response.status} - {await response.text()}")
    except Exception as e:
        logging.error(f"Kesalahan API: {e}")

# Fungsi utama untuk membaca UID RFID dari Arduino
async def read_rfid_from_serial():
    """Baca UID RFID dari Arduino dan kirim ke Laravel API"""
    try:
        # Hubungkan ke serial port
        with serial.Serial(
            port=SERIAL_CONFIG['port'],
            baudrate=SERIAL_CONFIG['baud_rate'],
            timeout=SERIAL_CONFIG['timeout']
        ) as ser:
            logging.info("Menunggu UID RFID dari Arduino...")
            while True:
                if ser.in_waiting > 0:
                    # Membaca UID RFID dari Arduino
                    raw_data = ser.readline().decode('utf-8').strip()
                    logging.info(f"Data mentah diterima: {raw_data}")
                    
                    # Ekstrak UID dari data yang dimulai dengan "RFID_OUT:"
                    if raw_data.startswith("RFID_OUT:"):
                        uid = raw_data.split(":")[1]  # Ambil bagian setelah "RFID_OUT:"
                        logging.info(f"UID RFID diterima: {uid}")
                        await send_uid_to_api(uid)
                await asyncio.sleep(0.1)  # Hindari blocking loop
    except serial.SerialException as e:
        logging.error(f"Kesalahan saat membaca serial: {e}")
    except Exception as e:
        logging.error(f"Kesalahan tidak terduga: {e}")

# Jalankan program
if __name__ == "__main__":
    logging.basicConfig(level=logging.INFO)
    try:
        asyncio.run(read_rfid_from_serial())
    except KeyboardInterrupt:
        logging.info("Program dihentikan oleh pengguna.")
