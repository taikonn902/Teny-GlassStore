import tensorflow as tf
from tensorflow.keras.applications import ResNet50
from tensorflow.keras.preprocessing.image import ImageDataGenerator
from tensorflow.keras.layers import Dense, GlobalAveragePooling2D
from tensorflow.keras.models import Model

# Số lớp của bạn (ví dụ: 10 lớp)
num_classes = 10  

# Tạo mô hình ResNet50 đã huấn luyện sẵn
base_model = ResNet50(weights='imagenet', include_top=False, input_shape=(224, 224, 3))
x = base_model.output
x = GlobalAveragePooling2D()(x)
x = Dense(1024, activation='relu')(x)
predictions = Dense(num_classes, activation='softmax')(x)

model = Model(inputs=base_model.input, outputs=predictions)

# Freeze layers of base model
for layer in base_model.layers:
    layer.trainable = False

model.compile(optimizer='adam', loss='categorical_crossentropy', metrics=['accuracy'])

# Prepare data
datagen = ImageDataGenerator(rescale=1./255, validation_split=0.2)
train_data = datagen.flow_from_directory('data/train', target_size=(224, 224), batch_size=32, subset='training')
val_data = datagen.flow_from_directory('data/train', target_size=(224, 224), batch_size=32, subset='validation')

# Train model
model.fit(train_data, validation_data=val_data, epochs=10)

# Save model
model.save('python/models/glasses_model.h5')
