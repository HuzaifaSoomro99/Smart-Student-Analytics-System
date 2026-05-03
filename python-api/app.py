from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/analyze', methods=['POST'])
def analyze():
    data = request.json

    marks = data['marks']
    avg = sum(marks) / len(marks)

    if avg < 40:
        status = "Weak"
    elif avg < 70:
        status = "Average"
    else:
        status = "Strong"

    return jsonify({
        "average": avg,
        "status": status
    })

if __name__ == '__main__':
    app.run(debug=True)