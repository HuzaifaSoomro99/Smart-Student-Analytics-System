from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/analyze', methods=['POST'])
def analyze():
    data = request.json
    students = data['students']  # list of dicts: {"name":..., "marks":...}

    # Average marks
    all_marks = [s['marks'] for s in students]
    average = sum(all_marks) / len(all_marks) if all_marks else 0

    # Top 5 students
    top5 = sorted(students, key=lambda x: x['marks'], reverse=True)[:5]

    # Pass/Fail ratio (pass >= 40)
    pass_count = len([m for m in all_marks if m >= 40])
    fail_count = len([m for m in all_marks if m < 40])

    return jsonify({
        "average": average,
        "top_5": top5,
        "pass_count": pass_count,
        "fail_count": fail_count
    })

if __name__ == '__main__':
    app.run(debug=True)