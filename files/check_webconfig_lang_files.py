#!/usr/bin/env python3
import sys
import re
import os
import glob

# Characters that may cause problems
problematic_chars = ['"', "'"]

# Allowed escaped characters
allowed_escaped_chars = ['\\"', "\\'"]

def usage():
    print("Usage: python3 check_webconfig_lang_files.py <directory_path>")
    sys.exit(1)

def is_disallowed(value):
    for char in problematic_chars:
        # Check for problematic character sequences in the value
        if char in value:
            # Ensure it's not an allowed escaped character
            if char in ['"', "'"]:
                escaped_char = '\\' + char
                if escaped_char in value and ('\\' + escaped_char) in value:
                    return True  # Disallow double escaping
                if escaped_char not in value:
                    return True  # Disallow unescaped occurrence
            else:
                return True  # Any other problematic string should be flagged
    return False

def check_file(file_path):
    error_found = False
    print(f"\nChecking file: {file_path}")
    try:
        with open(file_path, 'r', encoding='utf-8') as file:
            for line_num, line in enumerate(file, 1):
                match = re.search(r'define\(\s*\"(.*?)\"\s*,\s*\"(.*?)\"\s*\);', line)
                if match:
                    const_name = match.group(1)
                    value = match.group(2)

                    if is_disallowed(value):
                        print(f"[ERROR] Line {line_num}: Constant '{const_name}' contains a problematic character sequence.")
                        print(f"        -> Value: {value}")
                        error_found = True
    except FileNotFoundError:
        print(f"[ERROR] File '{file_path}' not found.")
    return error_found

def main():
    if len(sys.argv) != 2:
        usage()

    directory = sys.argv[1]
    if not os.path.isdir(directory):
        print(f"[ERROR] '{directory}' is not a valid directory.")
        usage()

    lang_files = glob.glob(os.path.join(directory, "lang_*.php"))

    if not lang_files:
        print("[INFO] No matching lang_*.php files found in the directory.")
        sys.exit(0)

    overall_error = False

    for lang_file in lang_files:
        if check_file(lang_file):
            overall_error = True

    if overall_error:
        print("\n[SUMMARY] Errors found in language files.")
        sys.exit(1)
    else:
        print("\n[SUMMARY] No errors found.")
        sys.exit(0)

if __name__ == "__main__":
    main()
